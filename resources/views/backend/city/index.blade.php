@extends('backend.layouts.app')

@section('title', __('City Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('City Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.city.create')"
                :text="__('Create City')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:cities-table />
        </x-slot>
    </x-backend.card>
@endsection
