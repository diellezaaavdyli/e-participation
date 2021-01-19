<td>{{$issue->title}}</td> 
<td>{{$issue->user->name}}</td>
<td><a target="_blank" href="{{route('admin.issues.previewissue',  ['id' => $issue->id])}}"><i class="fas fa-eye"></i></a>  </td>
<td>
@if ($logged_in_user->can('admin.access.issue.status'))
<form id="change-status-{{$issue->id}}" action="{{route('admin.issues.updatestatus')}}" method="post">
            {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$issue->id}}">
            <label for="status-{{$issue->id}}" class="switch">
          <input class="checkbox-action"  type="checkbox" name="status" value="{{$issue->status}}" id="status-{{$issue->id}}"  data-id="{{$issue->id}}" {{$issue->status == 1 ? 'checked':''}}>
            <span class="slider round"></span>
      </label>
  </form>
  @else
 @lang('translator.not_allowed')
 @endif  
</td>
<td>
@if ($logged_in_user->can('admin.access.issue.delete'))
  <button class="btn btn-danger btn-sm delete-event" data-id="{{$issue->id}}">@lang('translator.label_delete')</button>
 @else
 @lang('translator.not_allowed')
 @endif
  </td>
  @if ($logged_in_user->can('admin.access.issue.delete'))
<div class="card card-fixed delete-card-{{$issue->id}}">
    <div class="card-header text-danger">
    @lang('translator.delete_issue_popup_title')
    </div>
    <div class="card-body">
        <p>@lang('translator.delete_question_issue')?</p>
        <form action="{{route('admin.issues.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$issue->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>
@endif