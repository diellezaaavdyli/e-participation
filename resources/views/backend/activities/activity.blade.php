
    <td>{{$activity->title}}</td>
    <td>{{$activity->location}}</td>
    <td>{{$activity->date}}</td>
    <td>
    @if ($logged_in_user->can('admin.access.activity.edit'))
        <form id="change-status-{{$activity->id}}" action="{{route('admin.activities.updatestatus')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$activity->id}}">
            <label class="switch">
                <input class="checkbox-action" data-id="{{$activity->id}}" type="checkbox" name="status" value="{{$activity->status}}" {{$activity->status == 1 ? 'checked':''}} >
                <span class="slider round"></span> 
            </label>
        </form>
        @else
            @lang('translator.not_allowed')
        @endif    
    </td>
    @if ($logged_in_user->can('admin.access.activity.edit'))
    <td><a class="btn btn-success" href="{{route('admin.activities.show', $activity)}}">@lang('translator.label_show')</a></td>
    @else
            @lang('translator.not_allowed')
        @endif  
    <td>
    @if ($logged_in_user->can('admin.access.activity.edit'))
    <button role="button" class="btn btn-warning edit-event" data-id="{{$activity->id}}">@lang('translator.label_edit')</button>
    @else
        @lang('translator.not_allowed')
    @endif  
    </td>
    <td>
    @if ($logged_in_user->can('admin.access.activity.delete'))
    <button class="btn btn-danger delete-event"  data-id="{{$activity->id}}">@lang('translator.label_delete')</button>
    @else
        @lang('translator.not_allowed')
    @endif  
    </td>
@if ($logged_in_user->can('admin.access.activity.edit'))
<div class="card card-fixed card-fixed-{{$activity->id}}">
    <div class="card-header">
          @lang('translator.edit_activity_popup_title')
    </div>
    <div class="card-body">
        <form id="activity-form-{{$activity->id}}" action="{{route('admin.activities.update')}}" method="post">
            {{ csrf_field() }} 
                <input type="hidden" name="id" value="{{$activity->id}}">
                <div class="form-group">
                    <label for="title"> @lang('translator.label_title')</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{$activity->title}}">
                </div>
                <div class="form-group">
                    <label for="date"> @lang('translator.label_date')</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{$activity->date}}">
                </div>
                <div class="form-group">
                    <label for="location">@lang('translator.label_location')</label>
                    <select class="form-control" name="location" id="location" value="{{$activity->location}}">
                        <option value="Deçan">Deçan</option>
                        <option value="Gjakovë">Gjakovë</option>
                        <option value="Gllogoc">Gllogoc</option>
                        <option value="Dragash">Dragash</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Istog">Istog</option>
                        <option value="Kaçanik">Kaçanik</option>
                        <option value="Klinë">Klinë</option>
                        <option value="Fushë Kosovë">Fushë Kosovë</option>
                        <option value="Kamenicë">Kamenicë</option>
                        <option value="Leposaviq">Leposaviq</option>
                        <option value="Lipjan">Lipjan</option>
                        <option value="Obiliq">Obiliq</option>
                        <option value="Rahovec">Rahovec</option>
                        <option value="Pejë">Pejë</option>
                        <option value="Podujevë">Podujevë</option>
                        <option value="Prishtinë">Prishtinë</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Skënderaj">Skënderaj</option>
                        <option value="Shtime">Shtime</option>
                        <option value="Shtërpcë">Shtërpcë</option>
                        <option value="Suharekë">Suharekë</option>
                        <option value="Ferizaj">Ferizaj</option>
                        <option value="Viti">Viti</option>
                        <option value="Vushtrri">Vushtrri</option>
                        <option value="Zubin Potok">Zubin Potok</option>
                        <option value="Zveçan">Zveçan</option>
                        <option value="Malishevë">Malishevë</option>
                        <option value="Novobërdë">Novobërdë</option>
                        <option value="Mitrovicë e Veriu">Mitrovicë e Veriu</option>
                        <option value="Mitrovicë e Jugu">Mitrovicë e Jugu</option>
                        <option value="Junik">Junik</option>
                        <option value="Hani i Elezit">Hani i Elezit</option>
                        <option value="Mamushë">Mamushë</option>
                        <option value="Graçanicë">Graçanicë</option>
                        <option value="Ranillug">Ranillug</option>
                        <option value="Partesh">Partesh</option>
                        <option value="Kllokot">Kllokot</option>
                    </select>
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary float-right submit-activity-update-form" data-id="{{$activity->id}}">@lang('translator.save')</button>
                </div>
            </form>
    </div>
</div>
@endif 

@if ($logged_in_user->can('admin.access.activity.delete'))
<div class="card card-fixed delete-card-{{$activity->id}}">
    <div class="card-header text-danger">
        Delete Activity
    </div>
    <div class="card-body">
        <p>Are you sure you want to delete this activity?</p>
        <form id="activity-delete-form-{{$activity->id}}" action="{{route('admin.activities.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$activity->id}}">
            <div class="w-100">
                <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
            </div>
        </form>
    </div>
</div>

@endif 