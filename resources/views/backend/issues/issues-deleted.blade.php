@extends('backend.layouts.app')

@section('title', __('Deleted Issues'))

@section('content')

    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        Issues List
        </div>
        <div class="card-body">
            <div class="w-100 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">@lang('translator.label_title')</th>
                            <th scope="col">@lang('translator.label_user')</th>
                            <th scope="col">@lang('translator.label_restore')</th>
                            <th scope="col">@lang('translator.label_delete_permanently')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($issues as $issue)
                        <tr>
                        @include('backend.issues.issue-deleted')
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-100">
            {!! $issues->render() !!}
        </div>
        </div>
        </div>
    </div>

<div class="overlay">

</div>
@endsection