@extends('backend.layouts.app')

@section('title', __('Deleted Tags'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header">
                 @lang('translator.deleted_tags_title')
                </div>
                <div class="card-body">
                  <div class="w-100 table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">@lang('translator.label_name')</th>
                            <th scope="col">@lang('translator.label_restore')</th>
                            <th scope="col">@lang('translator.label_delete_permanently')</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr id="tag-item-{{$tag->id}}">
                                @include('backend.tags.tag-deleted')
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