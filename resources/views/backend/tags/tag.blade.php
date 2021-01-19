
    <td>{{$tag->name}}</td>
    <td>
    @if ($logged_in_user->can('admin.access.tag.edit'))
        <form id="change-status-{{$tag->id}}" action="{{route('admin.tags.updatestatus')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$tag->id}}">
             <label for="status-{{$tag->id}}" class="switch">
                <input class="checkbox-action"  type="checkbox" name="status" value="{{$tag->status}}" id="status-{{$tag->id}}"  data-id="{{$tag->id}}" {{$tag->status == 1 ? 'checked':''}}>
                 <span class="slider round"></span>
            </label>
        </form>
    @else
        @lang('translator.not_allowed')
    @endif    
    </td>
    <td>
    @if ($logged_in_user->can('admin.access.tag.edit'))
    <button class="btn btn-warning edit-event" data-id="{{$tag->id}}">@lang('translator.label_edit')</button>
    @else
    @lang('translator.not_allowed')
    @endif
    </td>
    <td>
    @if ($logged_in_user->can('admin.access.tag.delete'))
    <button class="btn btn-danger delete-event"  data-id="{{$tag->id}}">@lang('translator.label_delete')</button>
    @else
    @lang('translator.not_allowed')
    @endif    
    </td>
@if ($logged_in_user->can('admin.access.tag.edit'))
<div class="card card-fixed card-fixed-{{$tag->id}}">
    <div class="card-header">
      @lang('translator.edit_tag_popup_title')
    </div>
    <div class="card-body">
        <form action="{{route('admin.tags.update')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$tag->id}}">
                <div class="form-group">
                    <label for="name">@lang('translator.label_name')</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$tag->name}}">
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary float-right" data-id="{{$tag->id}}">@lang('translator.save')</button>
                </div>
        </form>
    </div>
</div>
@endif 
@if ($logged_in_user->can('admin.access.tag.delete'))
<div class="card card-fixed delete-card-{{$tag->id}}">
    <div class="card-header text-danger">
    @lang('translator.delete_tag_popup_title')
    </div>
    <div class="card-body">
        <p>@lang('translator.delete_question_tag')</p>
        <form action="{{route('admin.tags.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$tag->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>
@endif 