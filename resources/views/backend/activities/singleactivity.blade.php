@extends('backend.layouts.app')

@section('title', __('Activities'))
@section('breadcrumb-links')

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="w-100 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">@lang('translator.label_name')</th>
                            <th scope="col">@lang('translator.label_email')</th>
                            <th scope="col">@lang('translator.label_phone')</th>
                            <th scope="col">@lang('translator.label_comment')</th>
                            <th scope="col">@lang('translator.label_status')</th>
                            <th scope="col">@lang('translator.label_delete')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                            <tr>
                            @include('backend.activities.form')
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $forms->render() !!} 
            </div>
        </div>
    </div>
</div>
<div class="overlay">
    
</div>
@endsection