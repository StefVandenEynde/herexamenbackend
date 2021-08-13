<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Contact;

class ContactController extends Controller
{
    public function add(Request $request)
    {
        return vieuw('contact.add');
    }

    function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request ->input('email');
        $contact->save();

        return redirect('/')-> with ('error', 'contact was created');
    }

    public function edit(int $id)
    {
        try
        {
            $contact = Contact::findOrFail($id);
        }
        catch(ModelNotFoundExeption $e)
        {
            return redirect('/')->with('error', 'Contact not found');
        }
        return view('contact.edit',['contact'->$contact]);
    }
}
