

@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
            <h4 class="heading4">{{$issue->title}}</h4>
            <p>{!! $issue->description !!}</p>
           </div>
           <div class="col-12 col-lg-8">
            <hr>
           </div>
           
           <div class="col-12 col-lg-8">
               <div class="card">
                   <div class="card-header">
                       @lang('translator.leave_a_comment')
                   </div>
                   <div class="card-body">
                        <form action="{{route('frontend.comment.store')}}" method="POST">
                            {{ csrf_field() }} 
                            <input type="hidden" value="{{$issue->id}}" name="issue">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" id="" cols="20" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary float-right" type="submit" value="Comment">
                            </div>
                        </form>
                   </div>
               </div>

                       <div class="message-wrapper d-inline-block w-100">
                           @if ($errors->any())
                               <div class="alert alert-danger mt-4  w-100">
                                   <ul class="list-unstyled">
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
                 
               
           </div> 
           <div class="col-12 col-lg-8 mt-4">
               @if(count($comments) > 0)
               <h3>Comments <span class="float-right">({{count($comments)}})</span> </h3>
               <hr>
               @foreach($comments as $comment)
               @include('frontend.issues.comment')
               @endforeach
               @endif
           </div>
           <div class="col-12 col-lg-8 mt-4">
            @if(count($comments) > 0)
            {!! $comments->render() !!}
            @endif
           </div>
         </div>
        </div><!--col-md-12-->
    </div><!--row-->
</div>
@endsection