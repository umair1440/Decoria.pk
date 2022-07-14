<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Mail\SendGrid;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::cursor();
        return view('admin.contacts.index')->with([
            'contacts' => $contacts,
        ]);
    }

    public function trash()
    {
        $contacts = Contact::onlyTrashed()->get();
        return view('admin.contacts.trash')->with([
            'contacts' => $contacts,
        ]);
    }
    public function restore($id)
    {
        $contacts = Contact::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::get('http://ip-api.com/json/' . $request->ip);
        $res = $response->collect()->only(['query', 'country', 'city', 'org'])->toJson();
        $name = $request->firstName . ' ' . $request->lastName;

        // try {
        // Mail::to('umair.enzipe@gmail.com')->send(new ContactEmail);

        $input = ['message' => 'This is a test!'];

        Mail::to('umair.enzipe@example.com')->send(new SendGrid($input));

            Contact::create([
                'name' => $name,
                'email' => $request->email,
                'message' => $request->message,
                'ip_info' => $res,
            ]);
            return Redirect::back()->withErrors(['msg' => 'Your query has been submited we will contact with you soon', 'status' => 'success']);;

            
        // } catch (\Throwable $th) {
            // return Redirect::back()->withErrors(['msg' => 'error while contacting please try again', 'status' => 'danger']);
        // }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
    public function delete($id)
    {
        Contact::destroy($id);
        return redirect()->back();
    }
}
