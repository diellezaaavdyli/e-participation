<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class ActivityController extends Controller
{
    public function index(Request $request)
    {   
        if(isset($request->date)){
           $datesplit = explode("/", $request->date);
           $month = date("m", strtotime($datesplit[0]));
           $year = $datesplit[1];
            $dateactivities = Activity::where('status', 1)->whereRaw('MONTH(date) = '. $month)->whereRaw('YEAR(date) = '. $year)->orderBy('date', 'desc');
        } else {
            $dateactivities = Activity::where('status', 1)->orderBy('date', 'desc');
        }

        $dateactivitiespaginator = $dateactivities->paginate(10);
        $dateactivitiesreturned = $dateactivitiespaginator->groupBy(function($item) {
            return $item->date;
        });

        $activities = Activity::where('status', 1)->get();
        
        return view('frontend.activities.activities', [
            'activities'=>$activities, 
            'dateactivitiesreturned'=> $dateactivitiesreturned, 
            'dateactivitiespaginator' => $dateactivitiespaginator ]);
    }

    public function indexcalendar()
    {
        $activities = Activity::where('status', 1)->get();
        return response()->json($activities);
    }

}
