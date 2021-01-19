<div class="w-100 mt-2 d-inline-block">
<div class="reply-text-wrapper">
 {{$reply->reply}}.  @if(App::getLocale() =='sq') nga:  @else by: @endif<strong>{{$reply->user->name}}</strong>
</div>
    <div class="reply-action-wrapper">
    <ul class="list-unstyled float-right">
        <li class="d-inline-block">
        @if ($logged_in_user->can('admin.access.comment.status'))
            <form id="change-status-{{$comment->id}}-{{$reply->id}}" action="{{route('admin.comments.reply.updatestatus')}}" method="post">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$reply->id}}">
                    <label class="switch">
                        <input class="checkbox-action" data-id="{{$comment->id}}-{{$reply->id}}" type="checkbox" name="status" value="{{$reply->status}}" {{$reply->status == 1 ? 'checked':''}} >
                        <span class="slider round"></span>
                </label>
            </form>
            @else
                @lang('translator.not_allowed')
            @endif
            </li>
            <li  class="d-inline-block ml-2">
            @if ($logged_in_user->can('admin.access.comment.delete'))
                <button class="btn btn-danger btn-sm delete-event"  data-id="{{$comment->id}}-{{$reply->id}}">@lang('translator.label_delete')</button>
                @else
                    @lang('translator.not_allowed')
                @endif
            </li>
        </ul> 
    </div>
</div>
@if ($logged_in_user->can('admin.access.comment.status'))
<div class="card card-fixed delete-card-{{$comment->id}}-{{$reply->id}}">
    <div class="card-header text-danger">
       @lang('translator.delete_reply_popup_title')
    </div>
    <div class="card-body">
        <p> @lang('translator.delete_question_reply')</p>
        <form id="activity-delete-form-{{$comment->id}}-{{$reply->id}}" action="{{route('admin.comments.reply.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$reply->id}}">
            <div class="w-100">
                <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
            </div>
        </form>
    </div>
</div>
@endif