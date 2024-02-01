<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|max:255',
        ]);

        FormData::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
        ]);

        // return redirect()->back()->with('success', 'Form submitted successfully!');
         return redirect()->route('test.home')->with('success', 'Form submitted successfully!');
    }
}
