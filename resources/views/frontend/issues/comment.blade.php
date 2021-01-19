
<div class="w-100 comment-container-wrapper">
    <div class="w-100 mt-4 d-inline-block">
        <div class="comment-wrapper">
            <div class="comment-user-avatar">
            @inject('user', 'App\Models\User')
                <img class="w-100 rounded-circle" src="{{ $user::returnAuthUserAvatar($comment->user) }}" alt=""> 
            </div>
            <div class="comment-content-wrapper">
                <div class="w-100">
                <strong>{{$comment->user->name}}</strong>
                </div>
                <div class="w-100">
                    {{$comment->comment}}
                </div>
               
            </div>
        </div>
    </div>
    <div class="w-100 mt-2">
        <div class="reply-container-wrapper">
            <div class="reply-items">
                    @if(count($comment->replies) > 0)
                         @foreach($comment->replies as $reply)
                             @if($reply->status == true)
                             @include('frontend.issues.reply')
                            @endif
                        @endforeach
                   @endif
            </div>
            <a class="link reply-form-toggle" data-id="{{$comment->id}}" href="javascript:void(0)">Leave a Reply</a>
            <div class="w-100 reply-form-{{$comment->id}} d-none">
            <form action="{{route('frontend.reply.store')}}" method="post" class="mt-2">
                  {{ csrf_field() }} 
                 <input type="hidden" name="comment" value="{{$comment->id}}">
                <div class="form-group">
                    <textarea name="reply" id="reply-{{$comment->id}}" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Reply">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
