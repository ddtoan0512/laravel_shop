<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getViewContact()
    {
        return view('contact');
    }

    public function saveContact(Request $request)
    {
        $data               = $request->except('_token');
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        Contact::insert($data);

        $test = array([
            "product" => "test",
            "test" => "test1"
        ]);

        return redirect()->back();
    }
}

