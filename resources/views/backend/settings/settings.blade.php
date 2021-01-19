@extends('backend.layouts.app')

@section('title', __('translator.setings_title'))

@section('content')
@inject('content', 'App\Models\Content')
<div class="row">
    <div class="col-12 col-lg-7">
    <div class="card">
        <div class="card-header">
            @lang('translator.issue_page_description')
        </div>
        <div class="card-body">
            <form action="{{route('admin.settings.content')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="name" value="issue_description">
                    <textarea class="textarea" name="description"  cols="30" rows="15">
                        @if($content::returnContentValue('issue_description') && $content::returnContentValue('issue_description')->description)
                       {{$content::returnContentValue('issue_description')->description}}
                       @endif
                    </textarea>
                </div>
                <div class="form-group">
                    @if( $logged_in_user->can('admin.access.setting.edit'))
                    <button type="submit" class="btn btn-primary btn-sm float-right">@lang('translator.save')</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
        @lang('translator.form_page_description')
        </div>
        <div class="card-body">
            <form action="{{route('admin.settings.content')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="name" value="form_description">
                    <textarea class="textarea" name="description"   cols="30" rows="15">
                        @if($content::returnContentValue('form_description') && $content::returnContentValue('form_description')->description)
                        {{$content::returnContentValue('form_description')->description}}
                        @endif
                    </textarea>
                </div>
                <div class="form-group">
                   @if( $logged_in_user->can('admin.access.setting.edit'))
                    <button type="submit" class="btn btn-primary btn-sm float-right">@lang('translator.save')</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    </div>
     
    <div class="col-12 col-lg-5">
        <div class="card">
            <div class="card-header">
            @lang('translator.socials_title')
            </div>
            <div class="card-body">
                @inject('setting', 'App\Models\Social')
                <form action="{{route('admin.settings.socials')}}" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                        </div>
                        <input 
                        type="text" 
                        name="facebook" 
                        value="{{$setting::returnSocialValue('facebook')}}" 
                        class="form-control" placeholder="Facebook Url" 
                        aria-label="Facebook Url" 
                        aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                        </div>
                        <input 
                        type="text"  
                        name="instagram" 
                        class="form-control" 
                        value="{{$setting::returnSocialValue('instagram')}}" 
                        placeholder="Instagam" 
                        aria-label="Instagam Url" 
                        aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                        </div>
                        <input 
                        type="text"  
                        name="twitter" 
                        value="{{$setting::returnSocialValue('twitter')}}" 
                        class="form-control" 
                        placeholder="Twitter" 
                        aria-label="Twitter Url" 
                        aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        </div>
                        <input 
                        type="text"  
                        name="linkedin" 
                        value="{{$setting::returnSocialValue('linkedin')}}" 
                        class="form-control" 
                        placeholder="Linkedin Url" 
                        aria-label="Linkedin Url" 
                        aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                        </div>
                        <input 
                        type="text"  
                        name="youtube" 
                        value="{{$setting::returnSocialValue('youtube')}}" 
                        class="form-control" 
                        placeholder="Youtube" 
                        aria-label="Youtube Url" 
                        aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="form-group">
                    @if( $logged_in_user->can('admin.access.setting.edit'))
                    <button type="submit"  class="btn-sm btn btn-primary float-right">@lang('translator.save')</button>
                        @endif
                  
                </div>
            </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
            @lang('translator.sidebar_description')
            </div>
            <div class="card-body">
                <form action="{{route('admin.settings.content')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" name="name" value="sidebar_description">
                        <textarea class="textarea" name="description" id="" cols="30" rows="10">
                            @if($content::returnContentValue('sidebar_description') && $content::returnContentValue('sidebar_description')->description)
                            {{$content::returnContentValue('sidebar_description')->description}}
                            @endif
                        </textarea> 
                    </div>
                    <div class="form-group">
                        @if($content::returnContentValue('sidebar_description') && $content::returnContentValue('sidebar_description')->image)
                        <img width="150" class="mb-3" src="{{ url('/images') .'/'. $content::returnContentValue('sidebar_description')->image}}" alt="">
                        <hr>
                        @endif
                        @if( $logged_in_user->can('admin.access.setting.edit'))
                        <label for="image">@lang('translator.label_image')</label><br>
                        <input  type="file" name="image" id="">
                        @endif
                    </div>
                    <div class="form-group">
                    @if( $logged_in_user->can('admin.access.setting.edit'))
                    <button type="submit"  class="btn-sm btn btn-primary float-right">@lang('translator.save')</button>
                        @endif
            
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-7">
    <div class="card-body">
            <form action="{{route('admin.settings.content')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="name" value="activity_description">
                    <textarea class="textarea" name="description"  cols="30" rows="15">
                        @if($content::returnContentValue('activity_description') && $content::returnContentValue('activity_description')->description)
                       {{$content::returnContentValue('activity_description')->description}}
                       @endif
                    </textarea>
                </div>
                <div class="form-group">
                    @if( $logged_in_user->can('admin.access.setting.edit'))
                    <button type="submit" class="btn btn-primary btn-sm float-right">@lang('translator.save')</button>
                    @endif
                </div>
            </form>
        </div>
</div>
</div>
@endsection