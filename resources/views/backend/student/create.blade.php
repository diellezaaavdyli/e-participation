@inject('model', '\App\Models\Student')
@extends('backend.layouts.app')

@section('title', __('Create Student'))

@section('content')
    <x-forms.post :action="route('admin.student.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Student')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.student.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="first_name" class="col-md-2 col-form-label">@lang('First Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="first_name" class="form-control" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-md-2 col-form-label">@lang('Last Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="last_name" class="form-control" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_birth" class="col-md-2 col-form-label">@lang('Birthday')</label>

                        <div class="col-md-10">
                            <input type="text" name="date_birth" class="form-control" placeholder="{{ __('Birthday') }}" value="{{ old('date_birth') }}" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city_id" class="col-md-2 col-form-label">@lang('Gender')</label>

                        <div class="col-md-10">
                            <select name="city_id" class="form-control" required>
                                <option value="1">@lang('Male')</option>
                                <option value="1">@lang('Female')</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="disabilities" class="col-md-2 col-form-label">@lang('Disabilities')</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="disabilities" id="disabilities" class="form-check-input" type="checkbox" value="1" {{ old('disabilities', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="foster_care" class="col-md-2 col-form-label">@lang('Foster Care')</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="foster_care" id="foster_care" class="form-check-input" type="checkbox" value="1" {{ old('foster_care', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="social_assistance" class="col-md-2 col-form-label">@lang('Recipient of social assistance')</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="social_assistance" id="social_assistance" class="form-check-input" type="checkbox" value="1" {{ old('social_assistance', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Student')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
