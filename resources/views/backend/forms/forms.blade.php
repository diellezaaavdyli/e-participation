@extends('backend.layouts.app')

@section('title', __('translator.visit_form_manager'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            @if($type === 'plenary')
            @lang('translator.plenary_form_manager')
            @else
            @lang('translator.visit_form_manager')
            @endif
            </div>
            <div class="card-body">
                <div class="w-100 table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">@lang('translator.label_name')</th>
                        <th scope="col">@lang('translator.label_date_and_time')</th>
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
                    @include('backend.forms.form')
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

    <div class="row">
    <div class="col-12">
    @if(session()->has('error'))
        <div class="alert alert-danger">
                {{ session()->get('error') }}
        </div>
    @endif 
    </div>
    </div>

{!! $forms->render() !!}
<div class="overlay">

</div>

@endsection