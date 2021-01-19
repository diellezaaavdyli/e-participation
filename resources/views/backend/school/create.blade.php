@inject('model', '\App\Models\School')
@extends('backend.layouts.app')

@section('title', __('Create School'))

@section('content')
    <x-forms.post :action="route('admin.school.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create School')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.school.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city_id" class="col-md-2 col-form-label">@lang('City')</label>

                        <div class="col-md-10">
                            <select name="city_id" class="form-control" required>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create School')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
