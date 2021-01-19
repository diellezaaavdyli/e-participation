<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityForm;
use App\Models\Activity;
use App\Http\Requests\Frontend\ActivityFormRequest;
class ActivityFormController extends Controller
{
   public function store(ActivityFormRequest $request)
   {
        $activityForm = new ActivityForm;
        $activityForm->name = $request->name;
        $activityForm->comment = $request->comment;
        $activityForm->email = $request->email;
        $activityForm->tel = $request->tel;
        $activity = Activity::find($request->id);
        $activity->activityforms()->save($activityForm);
        return redirect()->back()->with(
            ['success'=> __('translator.activity_form_created')],
            ['errors'=> 'error']
        );
   }
}
