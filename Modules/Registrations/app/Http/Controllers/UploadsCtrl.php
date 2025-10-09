<?php
//UploadsCtrl.php


namespace Modules\Registrations\Http\Controllers;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment}; 
use Illuminate\Support\Facades\Storage;


class UploadsCtrl extends Controller
{


	public function upload(Request $request)
	{
	    // Validate required fields
	    $request->validate([
	        'application_id' => 'required|integer|exists:registrations,id',
	        'uploads' => 'required|array',
	        'uploads.*' => 'file|max:5120', // max 5MB per file
	    ]);

	    $applicationId = $request->input('application_id');
	    $uploads = $request->file('uploads'); // associative array

	    foreach ($uploads as $label => $file) {
	        // Generate a filename or path
	        //$filename = $file->getClientOriginalName(); // or use ->hashName() 

			$a=Registration::where('owner_id',$request->user()->id)
			->where('id',$applicationId) 
			->first();
			if ($a!=null) {  

		        // Store the file
		        $path = $file->store('attachments', 'public'); 

				$meta=$a->data??[];
				$uploads=$meta['uploads']??[];
				$uploads[$label]=$path;
				$meta['uploads']=$uploads;

				$a->data=$meta;
				$a->save();

			}

	    }

	    return back()->with('success', 'File uploaded successfully.');
	}

 


}