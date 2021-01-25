<div class="activity-item-wrapper">
    <div class="date-container">
        <span class="date-month text-capitalized">{{ substr( Date::parse($activity->date)->format('F'), 0, 3)}}</span>
        <span class="date-day">{{date('j', strtotime($activity->date)) }}</span>
    </div>
    <div class="activity-item-content">
        <h5>{{$activity->title}}</h5>
        <div class="date-location-activity">
            <div class="date">
             <span class="date-separator"><i class="far fa-calendar-alt"></i> 
             <span class="text-capitalized"> {{Date::parse($activity->date)->format('F')}}</span>
             {{date('j', strtotime($activity->date)) }},  
             {{date('Y', strtotime($activity->date)) }}</span>
             <span><i class="fas fa-map-pin"></i> {{$activity->location}}</span>
            </div>
        </div>
    </div>
    <div class="w-100 d-inline-block">
        <hr>
        <button class="btn btn-sm btn-success activity-form" data-id="{{$activity->id}}">@lang('translator.apply')</button>
    </div>
</div>

<div class="card card-fixed card-fixed-{{$activity->id}}">
    <div class="card-header">
     In order to attend the "{{$activity->title}}" activity, you should first apply by filling the information below. <br>The staff from 
     the Assembly of Kosovo will handle these requests and notify you with the response. 
    </div>
    <div class="card-body">
        <form action="{{route('frontend.forms.activityform')}}" method="post">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{$activity->id}}">
            <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('translator.label_name')</label>
                                    <input placeholder="@lang('translator.placelholder_form_name')"  class="form-control" name="name" id="name" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">@lang('translator.label_email')</label>
                                    <input placeholder="@lang('translator.placelholder_form_email')" class="form-control" name="email" id="email" type="email">
                                
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tel">@lang('translator.label_phone')</label>
                                    <input placeholder="@lang('translator.placelholder_form_phone')" class="form-control" name="tel" id="tel" type="tel">
                              
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="comment">@lang('translator.label_comment')</label>
                                    <textarea class="form-control" name="comment" id="comment"></textarea>
                              
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="submit-issue btn btn-primary float-right">@lang('translator.apply')</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>