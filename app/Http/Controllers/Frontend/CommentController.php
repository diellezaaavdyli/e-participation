<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CommentRequest;
class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->issue()->associate(Issue::find($request->issue));
        auth()->user()->comments()->save($comment);
        return redirect()->back()->with(
            ['success'=> __('translator.comment_add') ],
            ['errors'=> 'error']
        );
    }
}
