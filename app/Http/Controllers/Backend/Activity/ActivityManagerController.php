<?php

namespace App\Http\Controllers\Backend\Activity;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Activity\ActivityRequest;
class ActivityManagerController extends Controller
{

    
    public function index()
    {
        $activities = Activity::paginate(20);
        return view('backend.activities.activities', compact('activities'));
    }

    public function store(ActivityRequest $request)
    {
        $activity = new Activity;
        $activity->title = $request->title;
        $activity->date = $request->date;
        $activity->location = $request->location;
        $activity->save();
        return redirect()->back()->with(
            ['success'=> 'New Activity is created!'],
            ['errors'=> 'error']
        );
    }

    public function update(ActivityRequest $request)
    {
        $activity = Activity::find($request->id);
        $activity->title = $request->title;
        $activity->date = $request->date;
        $activity->location = $request->location;
        $activity->update();
        return redirect()->back()->with(
            ['success'=> 'The Activity is updated!'],
            ['errors'=> 'error']
        );
    }


    public function updatestatus(Request $request)
    {
        $activity = Activity::where('id', $request->id)->first();
        if($request->status == null){
            $activity->status = 0;
        } else {
            $activity->status = $request->status;
        }
        $activity->update();
        return redirect()->back();
    }
    
    public function show(Activity $activity){
        if(!$activity){
            return abort(404);
        }
        $forms = $activity->activityforms()->orderBy('created_at','desc')->paginate(30);
        return view('backend.activities.singleactivity')->with([
            'activity'=> $activity,
            'forms' => $forms
        ]);
    }

    public function destroy(Request $request)
    {
        $activity = Activity::where('id', $request->id)->first();
        $activity->delete();
        return redirect()->back();
    }

    public function deleted(){
        $activities = Activity::onlyTrashed()->paginate(20);
        return view('backend.activities.activities-deleted', compact('activities'));
    }

    public function restore(Request $request){
        $activity = Activity::onlyTrashed()->where('id', $request->id)->first();
        $activity->restore();
        return redirect()->back();
    }

    public function forcedelete(Request $request){
        $activity = Activity::onlyTrashed()->where('id', $request->id)->first();
        $activity->forceDelete();
        return redirect()->back();
    }
}
