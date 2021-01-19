<div class="w-100 mt-2 my-2">
 
    <div class="reply-wrapper">
        <div class="reply-user-avatar">
             @inject('user', 'App\Models\User')
            <img class="w-100 rounded-circle" src="{{ $user::returnAuthUserAvatar($reply->user) }}" alt=""> 
        </div>
        <div class="reply-content-wrapper">
            <div class="w-100">
            <strong>{{$reply->user->name}}</strong>
            </div>
            <div class="w-100">
                {{$reply->reply}}
            </div>
           
        </div>
    </div>
</div>