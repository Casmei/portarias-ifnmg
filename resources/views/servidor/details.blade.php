<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Servidor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('servidores') }}">
                <x-return-button class="w-30" />
            </a>

            <div class="flex justify-between space-x-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <p>Portarias Totais</p>
                    <h1 class="text-6xl mt-2 font-bold">{{ $totalPortarias }}</h1>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <p>Portarias Ativas</p>
                    <h1 class="text-6xl mt-2 font-bold">{{ $porcentagemAtivas }}%</h1>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <p>Portarias Finalizadas</p>
                    <h1 class="text-6xl mt-2 font-bold">{{ $porcentagemFinalizadas }}%</h1>
                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('servidor.partials.details-servidor-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- Quantidade de portarias ativas em % que o servidor participa --}}
{{-- Quantidade de portarias totais que o servidor participa --}}
{{-- Quantidade de portarias finalizadas que o servidor participa --}}
