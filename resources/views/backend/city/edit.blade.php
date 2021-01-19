@extends('backend.layouts.app')

@section('title', __('Update City'))

@section('content')
    <x-forms.patch :action="route('admin.city.update', $city)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update City')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.city.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text"  name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $city->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update City')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
