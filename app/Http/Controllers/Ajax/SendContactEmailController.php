<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\ContactNotificationMail;
use App\Models\ContactEntity;

class SendContactEmailController extends Controller
{
    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function index(Request $request)
    {
        $request->validate($this->rules);

        $contactEntity = ContactEntity::create($request->all());

        Mail::send(new ContactNotificationMail($contactEntity));

        return response()->json([
            'status' => 'success',
        ]);
    }
}
