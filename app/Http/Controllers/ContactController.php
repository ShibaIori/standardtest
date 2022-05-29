<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(ContactRequest $request) {
        $input = $request->all();

        return view('confirm', [
            'input' => $input,
        ]);
    }

    public function send(Request $request) {
        $this->validate($request, Contact::$rules);

        $action = $request->input('action');

        $form = $request->except('action');

        if ($action !== 'send') {
            return redirect('/')->withInput($form);
        }
        else {
            Contact::create($form);
            return view('thanks');
        }
    }

    public function data() {
        $items = Contact::Paginate(10);

        $input = [
            'fullname' => '',
            'gender' => '0',
            'date_start' => '',
            'date_end' => '',
            'email' => '',
        ];

        return view('data', [
            'items' => $items,
            'input' => $input,
        ]);
    }

    public function find(Request $request) {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $email = $request->input('email');

        $query = Contact::query();

        if(!empty($fullname)) {
            $query->where('fullname', 'LIKE', "%{$fullname}%");
        }

        if($gender != 0) {
            $query->where('gender', $gender);
        }

        if(!empty($date_start) && !empty($date_end)) {
            $query->whereBetween('created_at', [$date_start, $date_end]);
        }
        elseif (!empty($date_start)) {
            $query->where('created_at', '>=', $date_start);
        }
        elseif (!empty($date_end)) {
            $query->where('created_at', '<=', $date_end);
        }

        if(!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        $items = $query->paginate(10);
        $input = $request->all();

        return view('data', [
            'items' => $items,
            'input' => $input,
        ]);
    }

    public function delete(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/data');
    }
}
