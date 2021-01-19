@extends('backend.layouts.app')

@section('title', __('Role Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('translator.role_title')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.auth.role.create')"
                :text="__('translator.create_role_title')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:roles-table />
        </x-slot>
    </x-backend.card>
@endsection
