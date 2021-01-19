@inject('model', '\App\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('translator.edit_user_title')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('translator.label_cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $user->type }}'}">
                    @if (!$user->isMasterAdmin())
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">@lang('translator.label_type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                    <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('translator.label_name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('translator.label_name') }}" value="{{ old('name') ?? $user->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('translator.label_email')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('translator.label_email_placeholder') }}" value="{{ old('email') ?? $user->email }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    @if (!$user->isMasterAdmin())
                        @include('backend.auth.includes.roles')

                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.auth.includes.permissions')
                        @endif
                    @endif
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('translator.label_edit')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
