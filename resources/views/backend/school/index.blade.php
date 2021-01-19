@extends('backend.layouts.app')

@section('title', __('School Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('School Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.school.create')"
                :text="__('Create School')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:schools-table />
        </x-slot>
    </x-backend.card>
@endsection
