<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
 
    public function showForm()
    {
        return view('shop.contact');
    }


    public function submit(Request $request)
    {
      
        $validated = $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'message' => 'required|max:500',
        ]);

       
        ContactMessage::create($validated);

      
        return response()->json([
            'success' => true,
            'message' => 
        ]);
    }
}
