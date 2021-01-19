
    <td>{{$tag->name}}</td>
    <td>
    @if($logged_in_user->can('admin.access.tag.restore'))
    <button class="btn btn-warning edit-event" data-id="{{$tag->id}}">@lang('translator.label_restore')</button>
    @else
    @lang('translator.not_allowed')
    @endif
    </td>
    <td>
    @if($logged_in_user->can('admin.access.tag.delete-permanently'))
    <button class="btn btn-danger delete-event"  data-id="{{$tag->id}}">@lang('translator.label_delete')</button>
    @else
    @lang('translator.not_allowed')
    @endif
    </td>
    @if($logged_in_user->can('admin.access.tag.restore'))
<div class="card card-fixed card-fixed-{{$tag->id}}">
    <div class="card-header">
        @lang('translator.restore_tag_popup_title')
    </div>
    <div class="card-body">
        <form action="{{route('admin.tags.restore')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$tag->id}}">
                <div class="form-group">
                    <button  class="btn btn-primary float-right" data-id="{{$tag->id}}">@lang('translator.label_restore')</button>
                </div>
        </form>
    </div>
</div>
@endif
@if($logged_in_user->can('admin.access.tag.delete-permanently'))
<div class="card card-fixed delete-card-{{$tag->id}}">
    <div class="card-header text-danger">
    @lang('translator.delete_tag_popup_title')
    </div>
    <div class="card-body">
        <p>@lang('translator.delete_question_tag_permanently')?</p>
        <form action="{{route('admin.tags.forcedelete')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$tag->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>
@endif