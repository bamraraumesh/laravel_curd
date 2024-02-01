<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function showcontact()
    {
         return view('firstproject.forms.contact');
    }
    public function submitContect(Request $request)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts|max:100',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = contact::create($request->all()); // Fix: add parentheses ()
      //  FormData::create([              // for perticular feild you want to take
 //            'name' => $request->input('name'),
 //            'age' => $request->input('age'),
 //            'email' => $request->input('email'),
 //        ]);
        // return redirect()->back()->with('success', 'Form submitted successfully!');
        
      // return redirect()->route('index.display')->with('success', 'Form submitted successfully!');
      return redirect()->route('index.display')->with('success', 'data inserted successfully!');
    }


    public function index()
    {
        $contacts = Contact::all();
        return view('display-contact', compact('contacts'));
        // compact('contacts')  compact creates an associative array where the key is 'contacts' and the value is the value of the $contacts variable.
        //view('display-contact', compact('contacts')) is a helper function in Laravel that creates a view instance. 
        //The first argument is the name of the view file ('display-contact'), and the second argument is an array of data to be passed to the view.
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            abort(404, 'Contact not found');
        }

        return view('display-contact', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            abort(404, 'Contact not found');
        }

        return view('edit-contact', compact('contact'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'subject' => 'required|string|max:255',
        'message' => 'nullable|string', // Make message field optional
    ]);

    try {
        $contact = Contact::find($id);
        $contact->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            // Only update the message if it's provided in the request
            'message' => $request->filled('message') ? $request->input('message') : $contact->message,
            // 'message' => $request->input('message', ''), // This will default to empty string if message is not provided
        ]);
        session()->flash('success', 'The data was successfully submitted.');  //flash data is only available for the next request and then automatically removed. 
        return redirect()->route('index.display');
        // return redirect()->route('index.display')->with('success', 'Contact updated successfully!');
    } catch (\Exception $e) {
        // Log the error or return a custom error response
        session()->flash('error', $e->getMessage());  // it will help in display message in the desire view file 
        return redirect()->back();
        // return redirect()->back()->with('error', 'An error occurred while updating the contact: ' . $e->getMessage());
    }
}

// public function update(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:100',
//         'email' => 'required|email|max:100',
//         'subject' => 'required|string|max:255',
//     ]);

//     try {
//         $contact = Contact::find($id);
//         $contact->update([
//             'name' => $request->input('name'),
//             'email' => $request->input('email'),
//             'subject' => $request->input('subject'),
//             // Set the message to empty string if not provided
//             'message' => $request->input('message', ''), // This will default to empty string if message is not provided
           
//         ]);
        
//         return redirect()->route('index.display')->with('success', 'Contact updated successfully!');
//     } catch (\Exception $e) {
//         // Log the error message
//         // \Log::error('Error occurred while updating contact: ' . $e->getMessage());
    
//         // Flash the error message to the session
//         session()->flash('error', $e->getMessage());
    
//         // Redirect back to the edit form with the flashed error message
//         return redirect()->back();
//     }
    
    
// }

// public function login(Request $request)
// {
//     // Perform login authentication...

//     // If login is successful, store user information in the session
//     session(['user_id' => $user->id]);
//     session(['user_name' => $user->name]);
//     // Store any other user-related information as needed

//     // Redirect the user to their dashboard or another page
//     return redirect()->route('dashboard');
// }


    


    public function destroy($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            abort(404, 'Contact not found');
        }

        $contact->delete();

        return redirect()->route('index.display')->with('success', 'Contact deleted successfully!');

        // return view('display-contact', compact('contacts'));
    }
    
}



   

