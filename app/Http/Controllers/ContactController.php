<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('contact.index', compact('contacts'));
    }

    public function Create()
    {
        return view('contact.create');
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'owner_name' => 'required',
            'owner_title' => 'required',
            'owner_email' => 'required|email',
            'phone' => 'required',
            'owner_address' => 'required',
        ], [
            'phone.required' => 'The owner mobile field is required.',
        ]);

        Contact::insert([
            'owner_name' => $request->owner_name,
            'owner_title' => $request->owner_title,
            'owner_email' => $request->owner_email,
            'owner_mobile' => $request->phone,
            'owner_address' => $request->owner_address,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('contact.index')->with('success', 'The contact details were inserted successfully');
    }

    public function Edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'owner_name' => 'required',
            'owner_title' => 'required',
            'owner_email' => 'required|email',
            'phone' => 'required',
            'owner_address' => 'required',
        ], [
            'phone.required' => 'The owner mobile field is required.',
        ]);

        Contact::findOrFail($id)->update([
            'owner_name' => $request->owner_name,
            'owner_title' => $request->owner_title,
            'owner_email' => $request->owner_email,
            'owner_mobile' => $request->phone,
            'owner_address' => $request->owner_address,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('contact.index')->with('success', 'The contact details has been updated successfully');
    }

    public function Delete($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'The contact details has been deleted successfully');
    }
}
