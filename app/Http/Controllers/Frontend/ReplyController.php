<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\ReplyRequest;
class ReplyController extends Controller
{
    public function store(ReplyRequest $request)
    {
        $reply = new Reply;
        $reply->reply = $request->reply;
        $reply->comment()->associate(Comment::find($request->comment));
        auth()->user()->replies()->save($reply);
        return redirect()->back()->with(
            ['success'=>  __('translator.reply_add')],
            ['errors'=> 'error']
        );
    }
}
