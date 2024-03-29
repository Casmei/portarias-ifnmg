<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Portaria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 d-flex justify-content-between">
            <a href="{{ route('ordinance') }}">
                <x-return-button class="w-30" />
            </a>
            <div class=" p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                <div class="max-w-xl">
                    @include('portaria.partials.details-portaria-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
