<?php
//UploadsCtrl.php


namespace Modules\CIEs\Http\Controllers;

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


class CieUploads2Ctrl extends Controller
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

	    if (!$request->hasFile('uploads')) {
	        return back()->withErrors(['uploads' => 'No files were uploaded.']);
	    }

	    $uploads = $request->file('uploads'); // associative array

			$a=Registration::where('id',$applicationId) 
			->first();
			if ($a!=null) {  

				$meta=$a->cies_reports??[];

				$meta['sectionH']=$meta['sectionH']??[];
				$meta['sectionH']['uploads']=$meta['sectionH']['uploads']??[];

				$sG=$meta['sectionH']??[];
				$uploads=$sG['uploads']??[];

	    foreach ($uploads as $label => $file) {
	    	if (!$file) {
	            continue;
	        }
	        // Generate a filename or path
	        //$filename = $file->getClientOriginalName(); // or use ->hashName() 


		        // Store the file
		        $path = $file->store('attachments', 'public'); 

				$uploads[$label]=$uploads[$label]??[];
				$uploads[$label][]=$path;



	    }
				$meta['sectionH']['uploads']=$uploads;
				$a->cies_reports=$meta;
				$a->save();

			}

	    return back()->with('success', 'File uploaded successfully.');
	}


	public function multiple(Request $request)
	{
	    // Validate required fields
	    $request->validate([
	        'application_id' => 'required|integer|exists:registrations,id',
	        'uploads' => 'required|array',
		    'uploads.*' => 'array',
		    'uploads.*.*' => 'file|mimes:jpg,png,pdf|max:5120',
	        //'uploads.*' => 'file|max:5120', // max 5MB per file
	    ]);

	    $applicationId = $request->input('application_id');

	    /*if (!$request->hasFiles('uploads')) {
	        return back()->withErrors(['uploads' => 'No files were uploaded.']);
	    }*/

	    $uploads1 = $request->file('uploads'); // associative array

			$a=Registration::where('id',$applicationId) 
			->first();
			if ($a!=null) {  

				$meta=$a->cies_reports??[];

				$meta['sectionH']=$meta['sectionH']??[];
				$meta['sectionH']['uploads']=$meta['sectionH']['uploads']??[];

				$sG=$meta['sectionH']??[];
				$uploads=$sG['uploads']??[];

	    foreach ($uploads1 as $label => $files) {
	    	foreach ($files as $file) {
	    	if (!$file) {
	            continue;
	        }
	        //dd($files);
	        // Generate a filename or path
	        //$filename = $file->getClientOriginalName(); // or use ->hashName() 


		        // Store the file
		        $path = $file->store('attachments', 'public'); 

				$uploads[$label]=$uploads[$label]??[];
				$uploads[$label][]=$path;

			}

	    }
				$meta['sectionH']['uploads']=$uploads;
				$a->cies_reports=$meta;
				$a->save();

			}

	    return back()->with('success', 'File uploaded successfully.');
	}

 


}