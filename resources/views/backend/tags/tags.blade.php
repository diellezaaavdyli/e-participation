@extends('backend.layouts.app')

@section('title', __('Activities'))
@section('breadcrumb-links')
@if ($logged_in_user->can('admin.access.tag.view-deleted'))
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.tags.deleted')" :text="__('translator.deleted_tags_title')" />
@endif
@endsection
@section('content')
    <div class="row">
        <div class="w-100 d-inline-block">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                       {{ session()->get('success') }}
                    </div>
                    @endif
                </div>
        <div class="col-12 col-md-5">
            <div class="card w-100">
            <div class="card-header">
                @lang('translator.add_tag_popup_title')
                </div>
                <div class="card-body">
                @if ($logged_in_user->can('admin.access.tag.add'))
                <form action="{{route('admin.tags.store')}}" method="post">
                {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="title"> @lang('translator.label_name')</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">@lang('translator.label_add')</button>
                    </div>
                </form>
                @else
                @lang('translator.not_allowed')
                @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="card w-100">
                <div class="card-header">
                     @lang('translator.tags_title')
                </div>
                <div class="card-body">
                    <div class="w-100 table-responsive">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">@lang('translator.label_name')</th>
                                <th scope="col">@lang('translator.label_status')</th>
                                <th scope="col">@lang('translator.label_edit')</th>
                                <th scope="col">@lang('translator.label_delete')</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr id="tag-item-{{$tag->id}}">
                                    @include('backend.tags.tag')
                                </tr>
                                 @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
              </div>
        </div>
    </div>
<div class="overlay">

</div>
@endsection