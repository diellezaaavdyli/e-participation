<?php

namespace App\Http\Controllers\Backend\Activity;
use App\Models\MailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityForm;
use App\Jobs\FormResponseJob;
class ActivityFormManagerController extends Controller
{
    
    public function response(Request $request){
        $form = ActivityForm::find($request->id);
        $form->status = $request->status;
 
        if($request->status == 'approved'){
            $mail_template = MailTemplate::where('name', 'activity_template_approved')->first();
        } else {
            $mail_template = MailTemplate::where('name', 'activity_template_disapproved')->first();
        }
        if(!$mail_template){
            return redirect()->back()->with(['error'=> __('translator.empty_forms')]);
        }
        $searchReplaceArray = array(
            '{{name}}' => $form->name, 
            '{{activity}}' => $request->activity
          );
          $message = str_replace(
            array_keys($searchReplaceArray), 
            array_values($searchReplaceArray), 
            $mail_template->body);

          $subject = str_replace(
                array_keys($searchReplaceArray), 
                array_values($searchReplaceArray), 
                $mail_template->header);

        FormResponseJob::dispatch($form->email, $subject, $message);
        $form->update();
        return redirect()->back();
    }

    public function destroy(Request $request){
        $form = ActivityForm::find($request->id);
        $form->delete();
        return redirect()->back();
    }
}
