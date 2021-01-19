<td>{{$issue->title}}</td> 
<td>{{$issue->user->name}}</td>
<td> 
@if ($logged_in_user->can('admin.access.issue.restore'))
<button class="btn btn-success btn-sm edit-event" data-id="{{$issue->id}}">@lang('translator.label_restore')</button> 
@else
 @lang('translator.not_allowed')
@endif

</td>
<td> 
@if ($logged_in_user->can('admin.access.issue.delete-permanently'))
<button class="btn btn-danger btn-sm delete-event" data-id="{{$issue->id}}">@lang('translator.label_delete')</button> 
@else
 @lang('translator.not_allowed')
@endif
</td>

@if ($logged_in_user->can('admin.access.issue.restore'))
<div class="card card-fixed card-fixed-{{$issue->id}}">
    <div class="card-header">
       @lang('translator.restore_issue_popup_title')
    </div>
    <div class="card-body">
        <form action="{{route('admin.issues.restore')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$issue->id}}">
                <div class="form-group">
                    <button  class="btn btn-primary float-right" data-id="{{$issue->id}}"> @lang('translator.label_restore')</button>
                </div>
        </form>
    </div>
</div>
@endif

@if ($logged_in_user->can('admin.access.issue.delete-permanently'))
<div class="card card-fixed delete-card-{{$issue->id}}">
    <div class="card-header text-danger">
    @lang('translator.delete_issue_popup_title')
    </div>
    <div class="card-body">
        <p>@lang('translator.delete_question_issue_permanently')</p>
        <form action="{{route('admin.issues.forcedelete')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$issue->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>
@endif