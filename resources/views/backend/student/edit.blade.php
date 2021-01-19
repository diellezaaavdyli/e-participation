@extends('backend.layouts.app')

@section('title', __('Update Student'))

@section('content')
    <x-forms.patch :action="route('admin.student.update', $student)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Student')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.student.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="first_namee" class="col-md-2 col-form-label">@lang('First Name')</label>

                        <div class="col-md-10">
                            <input type="text"  name="first_name" class="form-control" placeholder="{{ __('First Name') }}" value="{{ old('first_name') ?? $student->first_name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="last_name" class="col-md-2 col-form-label">@lang('Last Name')</label>

                        <div class="col-md-10">
                            <input type="text"  name="last_name" class="form-control" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') ?? $student->last_name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Student')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
