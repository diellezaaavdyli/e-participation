@extends('backend.layouts.app')

@section('title', __('Comments'))

@section('content')
    <div class="row">
        <div class="col-12">
            @foreach($comments as $comment)
         
                     @include('backend.comments.comment')
 
            @endforeach
        </div>
    </div>
<div class="overlay">
    
</div>
@endsection