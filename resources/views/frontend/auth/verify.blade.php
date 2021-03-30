@extends('frontend.layouts.app')

@section('title', __('Verify Your E-mail Address'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('translator.verify_email')
                    </x-slot>

                    <x-slot name="body">
                        @lang('translator.verify_email_quote')
                        @lang('translator.verify_email_question_part_1')

                        <x-forms.post :action="route('frontend.auth.verification.resend')" class="d-inline">
                            <button class="btn btn-link p-0 m-0 align-baseline" style="color:#0000fe;"
                                type="submit">@lang('translator.verify_email_question_part_2').</button>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div>
            <!--col-md-8-->
        </div>
        <!--row-->
    </div>
    <!--container-->
@endsection
