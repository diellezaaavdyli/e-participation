<style>
    .popper,
.tooltip {
  position: absolute;
  z-index: 9999;
  background: #efefef;
  color: black;
  width: max-content;
  border-radius: 3px;
  box-shadow: 0 0 2px rgba(0,0,0,0.5);
  padding: 10px;
  text-align: center;
}
.tooltip-inner {
    min-width:200px !important;
    background-color: transparent !important;
    color:#000 !important;
    text-align:left !important;
}
</style>
@extends('frontend.layouts.app')
@inject('content', 'App\Models\Content')
@section('title', __('translator.actvities_title'))
@section('content')
<div class="col-12 col-lg-8 text-center page-content-wrapper" style="margin: 0 auto;">
          
            <p style="font-weight:bold; font-size:20px;">Republic of Kosovo</p>
            <p style="font-weight:bold; font-size:20px;">Assembly of the Republic of Kosovo</p>
            <hr>
            <div class="w-100 mt-3">

@if($content::returnContentValue('activity_description') && $content::returnContentValue('activity_description')->description)
                    {!! $content::returnContentValue('activity_description')->description !!}
                    @endif
                
                  <hr>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="row justify-content-center">
                                
            <div class="col-12 col-lg-10">
            <div class="w-100 calendar-wrapper">
                <div id="calendar"></div>
            </div>
            @if(count($dateactivitiesreturned) > 0)
                    @foreach($dateactivitiesreturned as $date => $activitiesdata)
                    <div class="activity-content-item">
                        <h3><span class="text-capitalized"> {{Date::parse($date)->format('F')}}</span> {{date('j', strtotime($date)) }},  {{date('Y', strtotime($date)) }} <span class="float-right">({{$activitiesdata->count() }})</span></h3>
                        <hr>
                        <div class="w-100 activities-list">
                            @if(count($activitiesdata) > 0)
                                    @foreach($activitiesdata as $activity)
                                        @include('frontend.activities.activity')
                                    @endforeach
                            @endif
                         </div>
                       </div>
                    @endforeach
            @endif

            <div class="w-100">
            {{ $dateactivitiespaginator->render() }}
            </div>
           </div>
         </div>
        </div><!--col-md-12-->
    </div><!--row-->
</div>

@endsection

<script>
    
    //  title: info.event.extendedProps.description,
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            height:650,
            showNonCurrentDates:true,
            eventDidMount: function(info) {
      var tooltip = new Tooltip(info.el, {
       
                title:  info.event.extendedProps.description,
                placement: 'top',
                trigger: 'hover',
                container: 'body',
                html: true,
            });
            },
            events:[
                @foreach($activities as $activity)
                {
                    title : '{{ $activity->title }}',
                    start : '{{ $activity->date }}',
                    end : '{{ $activity->date }}',
                    description: '<strong> @lang('translator.actvitiy_title') :</strong> {{ $activity->title }} <br>  <strong>@lang('translator.label_location') :</strong> {{$activity->location}} <br> <strong> @lang('translator.label_date') :</strong> {{Date::parse($activity->date)->format('j F Y')}} <br><div class="w-100"><a class="btn btn-success btn-sm mt-2 activity-form" data-id="{{$activity->id}}">@lang('translator.apply')</a></div> ',
                },
                @endforeach
            ],
            headerToolbar: { center: 'dayGridMonth,dayGridWeek,timeGridDay' },
        });
        calendar.setOption('locale', '{{App::getLocale()}}');
        calendar.render();
      });
      
</script>

