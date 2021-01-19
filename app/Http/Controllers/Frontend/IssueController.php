<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\IssueRequest;
use App\Models\Issue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class IssueController extends Controller
{
    public function index(Request $request)
    {   
        if($request->search){
            $search = $request->search;
            $issues = Issue::where('status', true)->orderBy('created_at','desc')->where('title', 'like', "%{$search}%")->orWhere('description','like', "%{$search}%")->orderBy('created_at','desc')->paginate(20);
        } else if($request->tag){
            $tag = $request->all();
            
                 $issues =  Issue::whereHas('tags', function($query) use ($tag)
                {
                    $query->where(function($query)  use ($tag)
                    {
                        $query->where('slug', $tag);
                    });
                })->where('status', true)->orderBy('created_at','desc')->paginate(20)->appends($tag);
        }  else {
            $issues = Issue::where('status', true)->orderBy('created_at','desc')->paginate(20);
        }
        return view('frontend.issues.issues', compact('issues'));
    }


    public function store(IssueRequest $request)
    {

        $issue = new Issue;
        $issue->title = $request->title;
        $issue->slug =  Str::slug($request->title, '-');  
        $issue->description =  $request->description;
        auth()->user()->issues()->save($issue);
        $issue->tags()->attach($request->tags);
        return redirect()->back()->with(
            ['success'=>  __('translator.issue_created')],
            ['errors'=> 'error']
        );
    }
   
    public function getSingleIssue($slug)
    {
        $issue = Issue::where('slug', $slug)->where('status', true)->first();
        if(!$issue){
            return abort(404);
        }
        $comments = $issue->comments()->where('status', true)->orderBy('created_at','desc')->paginate(30);
        return view('frontend.issues.singleissue')->with([
            'issue'=> $issue,
            'comments' => $comments
        ]);
    }
}
