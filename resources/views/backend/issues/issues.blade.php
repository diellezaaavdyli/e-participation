@extends('backend.layouts.app')

@section('title', __('Issues'))
@section('breadcrumb-links')
@if ($logged_in_user->can('admin.access.issue.view-deleted'))
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.issues.deleted')" :text="__('translator.deleted_issues_title')" />
@endif
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
          @lang('translator.issues_list_title')
        </div>
        <div class="card-body">
            <div class="w-100 table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">@lang('translator.label_title')</th>
                        <th scope="col">@lang('translator.label_user')</th>
                        <th scope="col">@lang('translator.label_preview')</th>
                        <th scope="col">@lang('translator.label_status')</th>
                        <th scope="col">@lang('translator.label_delete')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                    <tr>
                    @include('backend.issues.issue')
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
</div> 
<div class="w-100">
{!! $issues->render() !!}
</div>
<div class="overlay">

</div>
@endsection