@extends('backend.layouts.app')

@section('title', __('Deleted Activities'))

@section('content')

    <div class="row">
        <div class="col-12">
        <div class="card w-100">
                <div class="card-header">
                @lang('translator.deleted_actvities_title')
                </div>
                <div class="card-body">
                  <div class="table-responsive w-100">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">@lang('translator.label_title')</th>
                            <th scope="col">@lang('translator.label_location')</th>
                            <th scope="col">@lang('translator.label_date')</th>
                            <th scope="col">@lang('translator.label_restore')</th>
                            <th scope="col">@lang('translator.label_delete_permanently')</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr id="activity-item-{{$activity->id}}">
                                @include('backend.activities.activity-deleted')
                            </tr>
                             @endforeach
                        </tbody>
                      </table>
                  </div>
                      <div class="w-100">
                          {!! $activities->render() !!}
                      </div>
                </div>
              </div>
        </div>
    </div>

<div class="overlay">
    
</div>
@endsection