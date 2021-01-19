@extends('frontend.layouts.app')

@section('title', __('translator.confirm_password_label'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('translator.confirm_password_label')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.password.confirm')">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@lang('translator.label_password')</label>

                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('translator.label_password') }}" maxlength="100" required autocomplete="current-password" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('translator.confirm_password')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
