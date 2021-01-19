<div class="card mt-4">
    <div class="card-body">
        <div class="comment-body w-100">
            <div class="comment-container">
                <div class="comment-wrapper">
                    <div class="w-100 d-inline-block">
                        <div class="comment-text-wrapper">
                        
                          @if(App::getLocale() =='sq') Postuar nga : @else  Postet by @endif  <strong>{{$comment->user->name}}</strong> @if(App::getLocale() =='sq') në Çështjen  @else  on @endif @if($comment->issue)<strong>{{$comment->issue->title}}</strong> @endif @if(App::getLocale() =='en') Issue. @endif
                        </div>
                        <div class="w-100 d-block d-md-none">
                            <p class="p-3 mb-2 bg-light "> {{$comment->comment}}</p>
                        </div>
                        <div class="comment-action">
                            <ul class="list-unstyled float-right">
                                <li class="d-inline-block">
                                @if ($logged_in_user->can('admin.access.comment.status'))
                                <form id="change-status-{{$comment->id}}" action="{{route('admin.comments.updatestatus')}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                    <label class="switch">
                                        <input class="checkbox-action" data-id="{{$comment->id}}" type="checkbox" name="status" value="{{$comment->status}}" {{$comment->status == 1 ? 'checked':''}} >
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                                @else
                                    @lang('translator.not_allowed')
                                @endif 
                                </li>
                                <li  class="d-inline-block ml-2">
                                @if ($logged_in_user->can('admin.access.comment.delete'))
                                   <button class="btn btn-danger btn-sm delete-event"  data-id="{{$comment->id}}">@lang('translator.label_delete')</button>
                                @else
                                    @lang('translator.not_allowed')
                                @endif
                                </li>
                            </ul>    
                        </div>
                    </div>
                    <div class="w-100">
                        <p class="p-3 mb-2 bg-light d-none d-md-block"> {{$comment->comment}}</p>
                          <br>
                        @if(count($comment->replies) > 0)
                        <div class="w-100">
                         <div class="text-default">
                         @if(App::getLocale() =='sq') 
                             Replikat
                         @else
                            Replies
                         @endif
                         </div> 
                        <hr>
                            <div class="replies-wrapper">
                             @foreach($comment->replies as $reply)
                                @include('backend.comments.reply')
                             @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

            </div> 
        </div>
    </div>
</div>
@if ($logged_in_user->can('admin.access.comment.delete'))
<div class="card card-fixed delete-card-{{$comment->id}}">
    <div class="card-header text-danger">
    @lang('translator.delete_comment_popup_title')
    </div>
    <div class="card-body">
        <p> @lang('translator.delete_question_comment')?</p>
        <form id="activity-delete-form-{{$comment->id}}" action="{{route('admin.comments.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$comment->id}}">
            <div class="w-100">
                <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
            </div>
        </form>
    </div>
</div>
@endif