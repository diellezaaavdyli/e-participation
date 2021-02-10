@extends('frontend.layouts.app')
@section('title', __('translator.forms_title'))
@inject('content', 'App\Models\Content')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="row justify-content-center">
        <div class="col-12 col-lg-10 text-center page-content-wrapper">
        <p style="font-weight:bold; font-size:20px;">@lang('translator.republicofKosovo')</p>
            <p style="font-weight:bold; font-size:20px; ">@lang('translator.assemblyofKosovo')</p>
            <hr style="width:60%;"> 
            <p>
            @lang('translator.visit_page_description1')<br> 
            @lang('translator.visit_page_description2')
            </p>
            <hr>
        </div>
       
            <div class="col-12 col-lg-10 mt-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="plenary-meeting-tab" data-toggle="tab" href="#plenary-meeting" role="tab" aria-controls="plenary-meeting" aria-selected="true">@lang('translator.plenary_meeting_form_label')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="visit-meeting-tab" data-toggle="tab" href="#visit-meeting" role="tab" aria-controls="visit-meeting" aria-selected="false">@lang('translator.visit_form_label')</a>
                    </li>
                    </ul>
            </div>
           
            <div class="col-12 col-lg-8">
                <div class="row">
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="plenary-meeting" role="tabpanel" aria-labelledby="plenary-meeting-tab">
                <form action="{{route('frontend.forms.storeplenary')}}"  method="POST" class="mt-5">
                    {{ csrf_field() }} 
                    <p style=" font-size:13px;"><i>@lang('translator.partPlanaryMeeting1')</i>
                    <br>@lang('translator.partPlanaryMeeting2') </p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('translator.label_name')</label>
                                    <input placeholder="@lang('translator.placelholder_form_name')" class="form-control" name="name" id="name" type="text">
                                </div>
                            </div>
                            
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="date">@lang('translator.label_date')</label>
                                    <input class="form-control" name="date" id="date" type="date">
                                 
                                </div> 
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="time">@lang('translator.label_time')</label>
                                    <input class="form-control" name="time" id="time" type="time">
                             
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">@lang('translator.label_email')</label>
                                    <input placeholder="@lang('translator.placelholder_form_email')" class="form-control"  name="email" id="email" type="email">
                                
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
                <div class="tab-pane fade" id="visit-meeting" role="tabpanel" aria-labelledby="visit-meeting-tab">
                    <form action="{{route('frontend.forms.storevisit')}}"  method="POST" class="mt-5">
                        {{ csrf_field() }} 
                        <p style=" font-size:13px;"><i>@lang('translator.payAVisit_1')</i> 
                       <br>@lang('translator.payAVisit_2') </p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">@lang('translator.label_name')</label>
                                        <input placeholder="@lang('translator.placelholder_form_name')"  class="form-control" name="name" id="name" type="text">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="date">@lang('translator.label_date')</label>
                                        <input class="form-control" name="date" id="date" type="date">
                                     
                                    </div> 
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="time">@lang('translator.label_time')</label>
                                        <input class="form-control" name="time" id="time" type="time">
                                 
                                    </div> 
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">@lang('translator.label_email')</label>
                                        <input placeholder="@lang('translator.placelholder_form_email')" class="form-control"  name="email" id="email" type="email">
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
            </div>
            </div>
           <div class="col-12 col-lg-8">
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                        

                @if(session()->has('success'))
                <div class="alert alert-success mt-4">
                       {{ session()->get('success') }}
                </div>
                @endif
            </div>
         </div>
        </div><!--col-md-12-->
    </div><!--row-->
</div>
<br>
<br>
@endsection




