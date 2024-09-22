<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::first();
        return view('backend.contact.edit', compact('contact'));
    }

    // Update a Contact
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'google_map' => 'required|string',
        ]);
        
        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'google_map' => $request->google_map
        ]);

        toastr()->success('Contact updated successfully', 'Success');
        return redirect()->route('contact.edit');
    }
}
