@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('translator.register')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.register')">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">@lang('translator.full_name')</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{ old('name') }}" placeholder="{{ __('translator.full_name') }}"
                                               maxlength="100" required autocomplete="name"/>
                                    </div><!--form-group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">@lang('translator.label_email')</label>

                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="{{ __('translator.label_email') }}" value="{{ old('email') }}"
                                               maxlength="255" required autocomplete="email"/>
                                    </div><!--form-group-->
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">@lang('translator.label_password')</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="{{ __('translator.label_password') }}" maxlength="100" required
                                                   autocomplete="new-password"/>
                                    </div><!--form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">@lang('translator.label_password_confirmation')</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                                   class="form-control" placeholder="{{ __('translator.label_password_confirmation') }}"
                                                   maxlength="100" required autocomplete="new-password"/>
                                    </div><!--form-group-->
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <div class="form-check">
                                        <input type="checkbox" name="terms" value="1" id="terms"
                                               class="form-check-input" required>
                                        <label class="form-check-label" for="terms">
                                            @lang('translator.agree') <a href="{{ route('frontend.pages.terms') }}"
                                                                       target="_blank">@lang('translator.terms_and_conditions')</a>
                                        </label>
                                    </div>
                                </div>
                            </div><!--form-group-->

                            @if(config('boilerplate.access.captcha.registration'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true"/>
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">@lang('Register')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
                <div class="message-wrapper d-inline-block w-100">
                    @if ($errors->any())
                        <div class="alert alert-danger mt-4 w-100">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
               </div>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
