@inject('model', '\App\Models\City')
@extends('backend.layouts.app')

@section('title', __('Create Role'))

@section('content')
    <x-forms.post :action="route('admin.city.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create City')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.city.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create City')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
