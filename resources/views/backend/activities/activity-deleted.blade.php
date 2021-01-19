
    <td>{{$activity->title}}</td>
    <td>{{$activity->location}}</td>
    <td>{{$activity->date}}</td>
    <td>
    @if ($logged_in_user->can('admin.access.activity.restore'))
    <button class="btn btn-warning edit-event" data-id="{{$activity->id}}">@lang('translator.label_restore')</button>
    @else
        @lang('translator.not_allowed')
    @endif 
    </td>
    <td>
    @if ($logged_in_user->can('admin.access.activity.delete-permanently'))
    <button class="btn btn-danger delete-event"  data-id="{{$activity->id}}">@lang('translator.label_delete')</button>
    @else
        @lang('translator.not_allowed')
    @endif 
    </td>
    @if ($logged_in_user->can('admin.access.activity.restore'))
    <div class="card card-fixed card-fixed-{{$activity->id}}">
    <div class="card-header">
        @lang('translator.restore_activity_popup_title')
    </div>
    <div class="card-body">
        <form action="{{route('admin.activities.restore')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$activity->id}}">
                <div class="form-group">
                    <button  class="btn btn-primary float-right" data-id="{{$activity->id}}">@lang('translator.label_restore')</button>
                </div>
        </form>
    </div>
</div>
@endif 

@if ($logged_in_user->can('admin.access.activity.delete-permanently'))
<div class="card card-fixed delete-card-{{$activity->id}}">
    <div class="card-header text-danger">
        @lang('translator.delete_activity_popup_title')
    </div>
    <div class="card-body">
        <p>@lang('translator.delete_question_activity_permanently')</p>
        <form action="{{route('admin.activities.forcedelete')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$activity->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>
@endif 