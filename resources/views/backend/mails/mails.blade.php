@extends('backend.layouts.app')

@section('title', __('translator.mails_title'))

@section('content')
@inject('mails', 'App\Models\MailTemplate')
<div class="row">
@if ($logged_in_user->can('admin.access.form.mail-template'))
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    
                    @lang('translator.mail_template_approved_title_for_plenary')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description')
                   </small>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label >@lang('translator.label_header')</label>
                        @php
                        $plenary_template_approved_header = '';
                        $plenary_template_approved_body = '';
                        @endphp
                        @if($mails::returnMail('plenary_template_approved') && $mails::returnMail('plenary_template_approved')->header)
                        @php  $plenary_template_approved_header = $mails::returnMail('plenary_template_approved')->header  @endphp
                        @endif

                        @if($mails::returnMail('plenary_template_approved') && $mails::returnMail('plenary_template_approved')->body)
                            @php $plenary_template_approved_body = $mails::returnMail('plenary_template_approved')->body  @endphp
                        @endif
                        <input type="text" name="header" class="form-control" value="{{$plenary_template_approved_header}}">
                    </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="plenary_template_approved">
                      
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">{{$plenary_template_approved_body}}</textarea>
                        </div>
                        <div class="form-group">
                        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                            <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    @lang('translator.mail_template_disapproved_title_for_plenary')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description') </small>
                </div>
                <div class="card-body">
                        @php
                        $plenary_template_disapproved_header = '';
                        $plenary_template_disapproved_body = '';
                        @endphp

                        @if($mails::returnMail('plenary_template_disapproved') && $mails::returnMail('plenary_template_disapproved')->header)
                        @php  $plenary_template_disapproved_header = $mails::returnMail('plenary_template_disapproved')->header  @endphp 
                        @endif

                        @if($mails::returnMail('plenary_template_disapproved') && $mails::returnMail('plenary_template_disapproved')->body)
                        @php $plenary_template_disapproved_body = $mails::returnMail('plenary_template_disapproved')->body  @endphp 
                        @endif
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label >@lang('translator.label_header')</label>
                            <input type="text" name="header" class="form-control" value="{{$plenary_template_disapproved_header}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="plenary_template_disapproved">
                           
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">
                            {{$plenary_template_disapproved_body}}
                            </textarea>
                        </div>
                        <div class="form-group">
                        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                            <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    @lang('translator.mail_template_approved_title_for_visit')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description') </small>
                </div>
                <div class="card-body">
                        @php
                        $visit_template_approved_header = '';
                        $visit_template_approved_body = '';
                        @endphp

                        @if($mails::returnMail('visit_template_approved') && $mails::returnMail('visit_template_approved')->header)
                        @php  $visit_template_approved_header = $mails::returnMail('visit_template_approved')->header  @endphp 
                        @endif

                        @if($mails::returnMail('visit_template_approved') && $mails::returnMail('visit_template_approved')->body)
                        @php $visit_template_approved_body = $mails::returnMail('visit_template_approved')->body  @endphp 
                        @endif
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label >@lang('translator.label_header')</label>
                            <input type="text" name="header" class="form-control" value="{{$visit_template_approved_header}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="visit_template_approved">
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">
                                {{$visit_template_approved_body}}
                            </textarea>
                        </div>
                        <div class="form-group">
                        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                            <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    @lang('translator.mail_template_disapproved_title_for_visit')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description') </small>
                </div>
                <div class="card-body">
                        @php
                        $visit_template_disapproved_header = '';
                        $visit_template_disapproved_body = '';
                        @endphp

                        @if($mails::returnMail('visit_template_disapproved') && $mails::returnMail('visit_template_disapproved')->header)
                        @php  $visit_template_disapproved_header = $mails::returnMail('visit_template_disapproved')->header  @endphp 
                        @endif

                        @if($mails::returnMail('visit_template_disapproved') && $mails::returnMail('visit_template_disapproved')->body)
                        @php $visit_template_disapproved_body = $mails::returnMail('visit_template_disapproved')->body  @endphp 
                        @endif
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label >@lang('translator.label_header')</label>
                            <input type="text" name="header" class="form-control" value="{{$visit_template_disapproved_header}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="visit_template_disapproved">
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">
                            {{$visit_template_disapproved_body}}
                            </textarea>
                        </div>
                        <div class="form-group">
                        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                            <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    @lang('translator.mail_template_approved_title_for_activity')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description_activity') </small>
                </div>
                <div class="card-body">
                        @php
                        $activity_template_approved_header = '';
                        $activity_template_approved_body = '';
                        @endphp

                        @if($mails::returnMail('activity_template_approved') && $mails::returnMail('activity_template_approved')->header)
                        @php  $activity_template_approved_header = $mails::returnMail('activity_template_approved')->header  @endphp 
                        @endif

                        @if($mails::returnMail('activity_template_approved') && $mails::returnMail('activity_template_approved')->body)
                        @php $activity_template_approved_body = $mails::returnMail('activity_template_approved')->body  @endphp 
                        @endif
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label >@lang('translator.label_header')</label>
                            <input type="text" name="header" class="form-control" value="{{$activity_template_approved_header}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="activity_template_approved">
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">
                              {{$activity_template_approved_body}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                                <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    @lang('translator.mail_template_disapproved_title_for_activity')
                    <br>
                    <small class="text-muted">
                    @lang('translator.mail_template_description_activity') </small>
                </div>
                <div class="card-body">
                        @php
                        $activity_template_disapproved_header = '';
                        $activity_template_disapproved_body = '';
                        @endphp

                        @if($mails::returnMail('activity_template_disapproved') && $mails::returnMail('activity_template_disapproved')->header)
                        @php  $activity_template_disapproved_header = $mails::returnMail('activity_template_disapproved')->header  @endphp 
                        @endif

                        @if($mails::returnMail('activity_template_disapproved') && $mails::returnMail('activity_template_disapproved')->body)
                        @php $activity_template_disapproved_body = $mails::returnMail('activity_template_disapproved')->body  @endphp 
                        @endif
                    <form action="{{route('admin.mails.updatemailtemplate')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label >@lang('translator.label_header')</label>
                            <input type="text" name="header" class="form-control" value="{{$activity_template_disapproved_header}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="name" value="activity_template_disapproved">
                            <label>@lang('translator.label_body')</label>
                            <textarea class="textarea form-control" name="body" id="body" value="" cols="60" rows="10">
                            {{$activity_template_disapproved_body}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.edit'))
                                <input type="submit" value="@lang('translator.save')" class="btn btn-primary float-right">
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif 
</div>
@endsection