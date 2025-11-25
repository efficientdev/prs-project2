<?php
namespace Modules\Proprietors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash;
//use Modules\Proprietors\Models\Proprietor; 
use Illuminate\Support\Str;
use App\Mail\WelcomeProprietor;
use Illuminate\Support\Facades\Mail;


class SignupCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = collect(['' => 'Select Title'] + Title::orderBy('title_name')->pluck('title_name','title_id')->all());
        
        $data = [
            'titles' => $titles,
        ];

        return view('proprietors::index');
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proprietors::create');
    }


    protected function generateUniqueUsername($name)
    {
        // Convert name to a slug (e.g., "John Doe" => "john-doe")
        $baseUsername = Str::slug($name);
        $username = $baseUsername;
        $counter = 1;

        // Check for uniqueness
        while (User::where('meta->username', $username)->exists()) {
            $username = $baseUsername . '-' . $counter;
            $counter++;
        }

        return $username;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {


        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'surname' => 'required|string|max:255',
            'other_names' => 'required|string|max:255',
            //'tin' => 'nullable|string|max:20',
            //'nin' => 'nullable|string|max:20',
            'phone_number' => 'nullable|string|max:20',
            'title' => 'nullable|string|max:20',
        ]);


        // Exclude password_confirmation and CSRF token from request data
        $v = $request->except('password_confirmation', '_token');

        // Extract only the name-related fields for storing in meta
        $meta2 = $v;//$request->only('other_names', 'surname');

        // Extract only the email from request
        $us = $request->only('email');

        // Set default or computed value for 'name' —
        // This example combines 'surname' and 'other_names' to make a full name
        $us['name'] = $meta2['surname'] . ' ' . $meta2['other_names'];
        $meta2['username']=$this->generateUniqueUsername($us['name']);

        // Store additional user metadata (like names) inside a 'meta' field
        $us['meta'] = $meta2;

        // Hash and set the password securely
        $us['password'] = Hash::make($request->password);

        // Create a new user with the constructed $us array
        $u = User::create($us);
        $u->assignRole('proprietor');

        // Extract additional meta data (e.g., for profile or identity info)
        $meta = $request->only('tin', 'nin', 'phone_number', 'title');
        $meta['name']=$us['name'];

        /*Proprietor::create([
            'user_id'=>$u->id,
            'meta'=>$meta
        ]);*/
         
        Mail::to($u->email)->send(new WelcomeProprietor($u));

        return redirect()->route('login');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('proprietors::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('proprietors::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
