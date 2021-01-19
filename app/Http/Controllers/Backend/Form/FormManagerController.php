<?php

namespace App\Http\Controllers\Backend\Form;
use App\Models\Form;
use App\Models\MailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\FormResponseJob;
use Illuminate\Support\Facades\DB;
class FormManagerController extends Controller
{
    public function index(Request $request)
    {
        $uri = $request->path();
        $title = '';
        $form_data_approved = '';
        $form_data_disapproved = '';
        $mails = MailTemplate::all();
        if($uri === 'admin/forms/plenary'){
            $type ='plenary';
            $forms = Form::where('type','plenary')->orderBy('created_at','desc')->paginate(10);
            $title = 'Manage Plenary Application';
        } else {
            $type ='visit';
            $forms = Form::where('type','visit')->orderBy('created_at','desc')->paginate(10);
             $title = 'Manage Visit Application';
        }
        return view('backend.forms.forms')->with([
            'forms'=>$forms,
            'title'=>$title,
            'type'=>$type
            ]);
    }
    
    public function response(Request $request){
        $form = Form::where('id', $request->id)->first();
        $form->status = $request->status;
        if($form->type ==='plenary'){
            if($request->status == 'approved'){
                $mail_template = MailTemplate::where('name', 'plenary_template_approved')->first();
            } else {
                $mail_template = MailTemplate::where('name', 'plenary_template_disapproved')->first();
            }
        } else {
            if($request->status == 'approved'){
                $mail_template = MailTemplate::where('name', 'visit_template_approved')->first();
            } else {
                $mail_template = MailTemplate::where('name', 'visit_template_disapproved')->first();
            }
        }
        if(!$mail_template){
            return redirect()->back()->with(['error'=> __('translator.empty_forms')]);
        }
        $message = str_replace("{{name}}", $form->name, $mail_template->body);
        $subject = str_replace("{{name}}", $form->name, $mail_template->header);
        FormResponseJob::dispatch($form->email, $subject, $message);
        $form->update();
       

        return redirect()->back();
    }



    public function destroy(Request $request)
    {
        $form = Form::where('id', $request->id)->first();
        $form->delete();
        return redirect()->back();
    }
}
