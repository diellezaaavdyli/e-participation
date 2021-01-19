@extends('backend.layouts.app')

@section('title', __('View User'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('translator.label_view_user')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('translator.label_back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('translator.label_type')</th>
                    <td>@include('backend.auth.user.includes.type')</td>
                </tr>

                <tr>
                    <th>@lang('translator.avatar')</th>
                    <td><img src="{{ $user->avatar }}" class="user-profile-image" /></td>
                </tr>

                <tr>
                    <th>@lang('translator.label_name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_email')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_status')</th>
                    <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_verified')</th>
                    <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_last_login_at')</th>
                    <td>
                        @if($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('translator.label_last_known_ip_address')</th>
                    <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                </tr>

                @if ($user->isSocial())
                    <tr>
                        <th>@lang('translator.label_provider')</th>
                        <td>{{ $user->provider ?? __('N/A') }}</td>
                    </tr>

                    <tr>
                        <th>@lang('translator.label_provider_id')</th>
                        <td>{{ $user->provider_id ?? __('N/A') }}</td>
                    </tr>
                @endif

                <tr>
                    <th>@lang('translator.label_roles')</th>
                    <td>{!! $user->roles_label !!}</td>
                </tr>

                <tr>
                    <th>@lang('translator.label_additional_permissions')</th>
                    <td>{!! $user->permissions_label !!}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('translator.label_account_created'):</strong>  {{Date::parse($user->created_at)->format('l j F Y H:i:s') }}
                <strong>@lang('translator.label_last_updated'):</strong>{{Date::parse($user->updated_at)->format('l j F Y H:i:s') }}

                @if($user->trashed())
                    <strong>@lang('translator.label_account_deleted'):</strong>{{Date::parse($user->deleted_at)->format('l j F Y H:i:s') }}
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection
