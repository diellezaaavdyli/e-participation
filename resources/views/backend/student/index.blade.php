@extends('backend.layouts.app')

@section('title', __('Student Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Student Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.student.create')"
                :text="__('Create Student')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:students-table />
        </x-slot>
    </x-backend.card>
@endsection
