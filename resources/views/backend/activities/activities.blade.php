@extends('backend.layouts.app')

@section('title', __('Activities'))
@section('breadcrumb-links')
@if ($logged_in_user->can('admin.access.activity.view-deleted'))
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.activities.deleted')" :text="__('translator.deleted_actvities_title')" />
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
                    @lang('translator.add_activity_popup_title')
                </div>
                <div class="card-body">
                @if ($logged_in_user->can('admin.access.activity.add'))
                <form action="{{route('admin.activities.store')}}" method="post">
                {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="title"> @lang('translator.label_title')</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="date"> @lang('translator.label_date')</label>
                        <input class="form-control" type="date" name="date" id="date">
                    </div>
                    <div class="form-group">
                        <label for="location"> @lang('translator.label_location')</label>
                        <select class="form-control" name="location" id="location">
                        <option value="Deçan">Deçan</option>
                        <option value="Gjakovë">Gjakovë</option>
                        <option value="Gllogoc">Gllogoc</option>
                        <option value="Dragash">Dragash</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Istog">Istog</option>
                        <option value="Kaçanik">Kaçanik</option>
                        <option value="Klinë">Klinë</option>
                        <option value="Fushë Kosovë">Fushë Kosovë</option>
                        <option value="Kamenicë">Kamenicë</option>
                        <option value="Leposaviq">Leposaviq</option>
                        <option value="Lipjan">Lipjan</option>
                        <option value="Obiliq">Obiliq</option>
                        <option value="Rahovec">Rahovec</option>
                        <option value="Pejë">Pejë</option>
                        <option value="Podujevë">Podujevë</option>
                        <option value="Prishtinë">Prishtinë</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Skënderaj">Skënderaj</option>
                        <option value="Shtime">Shtime</option>
                        <option value="Shtërpcë">Shtërpcë</option>
                        <option value="Suharekë">Suharekë</option>
                        <option value="Ferizaj">Ferizaj</option>
                        <option value="Viti">Viti</option>
                        <option value="Vushtrri">Vushtrri</option>
                        <option value="Zubin Potok">Zubin Potok</option>
                        <option value="Zveçan">Zveçan</option>
                        <option value="Malishevë">Malishevë</option>
                        <option value="Novobërdë">Novobërdë</option>
                        <option value="Mitrovicë e Veriu">Mitrovicë e Veriu</option>
                        <option value="Mitrovicë e Jugu">Mitrovicë e Jugu</option>
                        <option value="Junik">Junik</option>
                        <option value="Hani i Elezit">Hani i Elezit</option>
                        <option value="Mamushë">Mamushë</option>
                        <option value="Graçanicë">Graçanicë</option>
                        <option value="Ranillug">Ranillug</option>
                        <option value="Partesh">Partesh</option>
                        <option value="Kllokot">Kllokot</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">@lang('translator.save')</button>
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
                   @lang('translator.actvities_title')
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col"> @lang('translator.label_title')</th>
                                <th scope="col"> @lang('translator.label_location')</th>
                                <th scope="col"> @lang('translator.label_date')</th>
                                <th scope="col"> @lang('translator.label_status')</th>
                                <th scope="col"> @lang('translator.label_applications')</th>
                                <th scope="col"> @lang('translator.label_edit')</th>
                                <th scope="col"> @lang('translator.label_delete')</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $activity)
                                <tr id="activity-item-{{$activity->id}}">
                                    @include('backend.activities.activity')
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