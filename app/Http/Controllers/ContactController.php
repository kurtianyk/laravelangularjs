<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if($id == null){
          return Contact::orderBy('id', 'asc')->get();
        }else{
          return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->surname = $request->input('surname');
        $contact->phone_number = $request->input('phone_number');
        $contact->birth_day = $request->input('birth_day');
        $contact->info = $request->input('info');
        $contact->save();
        return 'Contact record succesfully created with id'.$contact->id;
    }

    public function show($id)
    {
        return Contact::find($id);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->surname = $request->input('surname');
        $contact->phone_number = $request->input('phone_number');
        $contact->birth_day = $request->input('birth_day');
        $contact->info = $request->input('info');
        $contact->save();
        return 'Contact record succesfully updated with id'.$contact->id;
    }

    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();
        return 'Contact record successfully deleted';
    }
}
