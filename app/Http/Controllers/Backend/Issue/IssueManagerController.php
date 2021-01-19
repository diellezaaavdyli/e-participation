<?php

namespace App\Http\Controllers\Backend\Issue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Issue;
class IssueManagerController extends Controller
{
    public function index()
    {
        $issues = Issue::orderBy('created_at','desc')->paginate(30);
        return view('backend.issues.issues', compact('issues'));
    }

    public function updatestatus(Request $request)
    {
        $issue = Issue::where('id', $request->id)->first();
        if($request->status == null){
            $issue->status = 0;
        } else {
            $issue->status = $request->status;
        }
        $issue->update();
        return redirect()->back();
    }
    
    public function previewissue($id){
        $issue = Issue::where('id', $id)->first();
        if(!$issue){
            return abort(404);
        }
        $comments = $issue->comments()->where('status', true)->orderBy('created_at','desc')->paginate(30);
        return view('frontend.issues.singleissue')->with([
            'issue'=> $issue,
            'comments' => $comments
        ]);
    }
    public function destroy(Request $request)
    {
        $issue = Issue::where('id', $request->id)->first();
        $issue->delete();
        return redirect()->back();
    }

    public function deleted(){
        $issues = Issue::onlyTrashed()->paginate(20);
        return view('backend.issues.issues-deleted', compact('issues'));
    }

    public function restore(Request $request){
        $issue = Issue::onlyTrashed()->where('id', $request->id)->first();
        $issue->restore();
        return redirect()->back();
    }

    public function forcedelete(Request $request){
        $issue = Issue::onlyTrashed()->where('id', $request->id)->first();
        $issue->forceDelete();
        return redirect()->back();
    }
}
