<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\ActivityForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class Activity extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title','location','date'
    ];

    public static function getLastActivites()
    {

        return $activities =  Activity::where('date','>=', Carbon::now())->where('status', '1')->orderBy('date')->get();

    }

    
    public static function getActivitiesByMonth()
    {

        return $monthactivities = DB::table('activities')->select(DB::raw('count(id) as `counter`'), DB::raw('YEAR(date) year, MONTH(date) month'))
        ->groupby('year','month')
        ->orderBy('date','desc')
        ->paginate(10);
    }

    public function activityforms(){
        return $this->hasMany(ActivityForm::class);
    }
}