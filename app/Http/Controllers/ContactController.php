<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.adminContact', compact('contacts'));
    }

    public function addinfo(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:250',
        ]);

        // Create a new instance of ContactInfo model and fill it with the form data
        $contactInfo = new Contact();
        $contactInfo->name = $request->input('name');
        $contactInfo->email = $request->input('email');
        $contactInfo->message = $request->input('message');
        $contactInfo->customerId = session()->get('id');

        $contactInfo->save();

        return redirect()->back()->with('success', 'Message sent successfully. We will reach you soon.');
    }

    public function delete($id)
    {
        $con = Contact::find($id);
        $con->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}
