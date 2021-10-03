<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Rules\Postcode;

class ContactController extends Controller
{
    public function index (){

        return view("index");

    }


    public function confirm(Request $request){

        $request->validate([
            "fullname" => "required|string",
            "gender" => "required",
            "email" => "required|email",
            "postcode" => ['required', new Postcode()],
            "address" => "required|string",
            "opinion" => "required|string|max:120"
        ]);

        $inputs = $request->all();

        return view('confirm', ['inputs' => $inputs]);

    }


    public function process(Request $request){

        $action = $request->get('submit', 'back');
        $input  = $request->except('submit');

        if($action === 'submit') {

            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            return redirect()->route('contact.thanks');

        } else {
            return redirect()->route('contact.index')->withInput($input);
        }

    }


    public function thanks() {

        return view('thanks');

    }


    public function search(Request $request) {

        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $from = $request->input('from');
        $until = $request->input('until');

        $query = Contact::query();

        if (!empty($fullname)) {
            $query->where('fullname', 'LIKE', "%$fullname%")
                ->get();
        }

        if (!empty($email)) {
            $query->where('email', 'LIKE', "%$email%")
                ->get();
        }

        if (!empty($from) && !empty($until)) {
            $query->whereBetween('created_at', [$from, $until])
                ->get();
        }

        if ($request->has('gender') && $gender != ('全て')) {
            $query->where('gender', $gender)
            ->get();
        }

        if (!empty($from) && empty($until)) {
            $query->where('created_at', '>=', $from)->get();
        }

        if (empty($from) && !empty($until)) {
            $query->where('created_at', '<=', $until)->get();
        }

        $data = $query->paginate(10);

        return view('search',[
            'data' => $data,
        ]);
    }

    public function destroy($id) {

        $data = Contact::find($id);
        $data->delete();

        return redirect()->route('contact.search');
    }
}
