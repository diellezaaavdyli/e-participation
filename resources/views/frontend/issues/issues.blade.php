@extends('frontend.layouts.app')
@section('title', __('translator.issues_title'))
@inject('content', 'App\Models\Content')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center page-content-wrapper" > 
            <p style="font-weight:bold; font-size:20px;">Republic of Kosovo</p>
            <p style="font-weight:bold; font-size:20px; ">Assembly of the Republic of Kosovo</p>
            <hr>
            <div class="w-100 mt-3">
                @if($content::returnContentValue('issue_description') && $content::returnContentValue('issue_description')->description)
                    {!! $content::returnContentValue('issue_description')->description !!}
                    @endif
            </div>
            <hr>
            </div>
       
            <div class="col-12 col-lg-8">
            <form id="issues-form" action="{{route('frontend.issues.store')}}"  method="POST">
                       {{ csrf_field() }} 
                    <div class="form-group">
                          <!--Put placeholders instead of the label below -->
                        <!-- <label for="title">@lang('translator.label_title')</label>-->
                        <input class="form-control" placeholder="Please write the title of your issue? " name="title" id="title" type="text" required>
                   
                    </div>
                    <div class="form-group">
                          <!--Put placeholders instead of the label below -->
                   <!-- <label for="description">@lang('translator.label_description')</label> -->
                          <textarea class="textarea form-control" placeholder="Please write the description of your issue?" name="description" id="description" ></textarea>
               
                    </div>

                    <div class="form-group">
                    <label for="tags">@lang('translator.label_tag')</label>
                    <select class="form-control selectpicker" multiple name="tags[]" required>
                    @inject('tags', 'App\Models\Tag')
                        @if(count($tags::getTags()) > 0)
                            @foreach($tags::getTags() as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    @endif
                    </select>
         
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="submit-issue btn btn-primary float-right">@lang('translator.save')</button>
                    </div>
                
            </form>
            <div class="message-wrapper d-inline-block w-100">
            @if ($errors->any())
                <div class="alert alert-danger mt-4 w-100">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                        

                @if(session()->has('success'))
                <div class="alert alert-success mt-4 w-100">
                       {{ session()->get('success') }}
                </div>
                @endif
            </div>
            <div class="issues-container w-100">
            @foreach($issues as $issue)
            @include('frontend.issues.issue')
             @endforeach
            </div>
            <div class="w-100">
            {!! $issues->render() !!}
            </div>
           </div>
         </div>
        </div><!--col-md-12-->
    </div><!--row-->
</div>
@endsection

