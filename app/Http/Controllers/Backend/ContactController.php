<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact=Contact::orderby('id','desc')->get();
        return view('backend.pages.contact.manage_contact_view', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.contact.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact= new Contact();
        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->subject= $request->subject;
        $contact->message= $request->message;
        $contact->save();
        session()->flash('message', 'successfully sent message');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Contact::find($id);

        if ($update && $update->read !== 1) {
            $update->update(['read' => 1]);
            return redirect()->route('contactmanage');
        }else{
            return redirect()->route('contactmanage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contactdelete=Contact::find($id);
        $contactdelete->delete();
        return redirect()->route('contactmanage');  
    }
}
