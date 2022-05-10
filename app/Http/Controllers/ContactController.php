<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller {

    public function submit(ContactRequest $req)
    {

      $contact = new Contact();
      $contact->name = $req->input('name');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');

      $contact->save();

      return redirect()->route('home')->with('success', 'Сообщение было добавлено');

    }

    public function allData()
    {
      $contact = new Contact;
      return view('messages', ['data' => $contact->all()]);
    }

    public function details($id)
    {
      $contact = new Contact;
      return view('detail-message', ['data' => $contact->find($id)]);
    }

    public function changeMessage($id) {
      $contact = new Contact;
      return view('change-message', ['data' => $contact->find($id)]);
    }

    public function deleteMessage($id) {
      $contact = Contact::find($id)->delete();
      return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }

    public function changeMessageSubmit($id, ContactRequest $req)
    {

      $contact = Contact::find($id);
      $contact->name = $req->input('name');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');

      $contact->save();

      return redirect()->route('contact-data-details', $id)->with('success', 'Сообщение было обновлено');

    }

}
