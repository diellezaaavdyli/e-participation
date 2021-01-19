<?php

namespace App\Http\Controllers\Backend;
use App\Models\MailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailManagerController extends Controller
{
    
    public function index()
    {
        return view('backend.mails.mails');
    }

    public function updatemailtemplate(Request $request)
    {
        $validatedData = $request->validate([
            'body' => ['required'],
            'header' => ['required']
        ]);
        $mail_template = MailTemplate::where('name', $request->name)->first();
        if(!$mail_template){
            $mail_template = new MailTemplate;
            $mail_template->name = $request->name;
            $mail_template->header = $request->header;
            $mail_template->body = $request->body;
            $mail_template->save();
        } else {
            $mail_template->header = $request->header;
            $mail_template->body = $request->body;
            $mail_template->update();
        }
        return redirect()->back();
    }
}
