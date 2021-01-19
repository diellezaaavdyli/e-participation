<td>{{$form->name}}</td>
<td>{{date('F', strtotime($form->date))}} {{date('j', strtotime($form->date)) }},  {{date('Y', strtotime($form->date)) }} - {{$form->time}}</td>
<td>{{$form->email}}</td>
<td>{{$form->tel}}</td>
<td>{{$form->comment}}</td>

<td>

@if($form->status === 'pending')
@if ($logged_in_user->can('admin.access.form.status'))
    <ul class="form-action-list">
        <li>
            <button class="approve-button btn btn-success btn-sm" data-id="{{$form->id}}">@lang('translator.label_approve')</button>
        </li>
        <li>
        <button class="disapprove-button btn btn-danger btn-sm" data-id="{{$form->id}}">@lang('translator.label_disapprove')</button>
        
        </li>
    </ul>
    @else
        @lang('translator.not_allowed')
    @endif 
@else

<span class="badge  
@if($form->status == 'approved') 
badge-success 
@else badge-danger  @endif">{{$form->status}}</span> 

@endif

</td>
<td>
@if ($logged_in_user->can('admin.access.form.delete'))
<button class="btn btn-danger btn-sm delete-event"  data-id="{{$form->id}}">@lang('translator.label_delete')</button>
@else
    @lang('translator.not_allowed')
@endif 
</td>

@if ($logged_in_user->can('admin.access.form.delete'))
<div class="card-fixed card approve-card-{{$form->id}}">
    <div class="card-header">
    @lang('translator.approve_application')
    </div>
    <div class="card-body">
        <form action="{{route('admin.forms.responsestatus')}}" method="post">
        {{ csrf_field() }} 
           <input type="hidden" name="id" value="{{$form->id}}">
           <input type="hidden" name="status" value="approved">
           <input class="btn btn-success btn-sm float-right" type="submit" value="@lang('translator.label_approve')">
       </form>
    </div>
</div>
@endif 

<div class="card-fixed card disapprove-card-{{$form->id}}">
    <div class="card-header">
    @lang('translator.disapprove_application')
    </div>
    <div class="card-body">
        <form action="{{route('admin.forms.responsestatus')}}" method="post">
        {{ csrf_field() }} 
           <input type="hidden" name="id" value="{{$form->id}}">
           <input type="hidden" name="status" value="disapproved">
           <input class="btn btn-danger btn-sm float-right" type="submit" value="@lang('translator.label_disapprove')">
       </form>
    </div>
</div>

<div class="card card-fixed delete-card-{{$form->id}}">
    <div class="card-header text-danger">
        @lang('translator.delete_application')
    </div>
    <div class="card-body">
        <p> @lang('translator.delete_application_question')</p>
        <form action="{{route('admin.forms.destroy')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$form->id}}">
          <div class="w-100">
            <button class="btn btn-danger float-right">@lang('translator.label_delete')</button>
          </div>
        </form>
    </div>
</div>