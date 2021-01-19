<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Jobs\VisitFormJob;
use App\Jobs\PlenaryFormJob;
use App\Http\Requests\Frontend\FormApplicationRequest;
class FormController extends Controller
{
    public function index()
    {
        return view('frontend.forms.forms');
    }

    public function storeplenary(FormApplicationRequest $request)
    {

        $form = new Form;
        $form->name = $request->name;
        $form->date = $request->date;
        $form->time = $request->time;
        $form->comment = $request->comment;
        $form->email = $request->email;
        $form->tel = $request->tel;
        $form->type = 'plenary';
        $form->save();
        PlenaryFormJob::dispatch($form->email, $form->name);
        return redirect()->back()->with(
            ['success'=>  __('translator.form_created')],
            ['errors'=> 'error']
        );
    }

    public function storevisit(FormApplicationRequest $request)
    {
        $form = new Form;
        $form->name = $request->name;
        $form->date = $request->date;
        $form->time = $request->time;
        $form->comment = $request->comment;
        $form->email = $request->email;
        $form->tel = $request->tel;
        $form->type = 'visit';
        $form->save();
        VisitFormJob::dispatch($form->email, $form->name);
        return redirect()->back()->with(
            ['success'=> __('translator.form_created')],
            ['errors'=> 'error']
        );
    }
}
