<?php

namespace App\Http\Controllers\Backend\Comment;
use App\Models\Comment;
use App\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentManagerController extends Controller
{
    public function index(){
        $comments = Comment::paginate(30)->sortByDesc('created_at');
        return view('backend.comments.comments', compact('comments'));
    }

    public function updatestatus(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        if($request->status == null){
            $comment->status = 0;
        } else {
            $comment->status = $request->status;
        }
        $comment->update();
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function replyupdatestatus(Request $request)
    {
        $reply = Reply::where('id', $request->id)->first();
        if($request->status == null){
            $reply->status = 0;
        } else {
            $reply->status = $request->status;
        }
        $reply->update();
        return redirect()->back();
    }

    public function replydestroy(Request $request)
    {
        $reply = Reply::where('id', $request->id)->first();
        $reply->delete();
        return redirect()->back();
    }
}
