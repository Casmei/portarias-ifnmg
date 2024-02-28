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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col mx-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 pb-10">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Numero da Portaria</th>
                                            <th scope="col" class="px-6 py-4">Data de inicio</th>
                                            <th scope="col" class="px-6 py-4">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($portarias as $portaria)
                                            <tr class="border-b border-gray-100">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    {{ $portaria->number }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ date('d/m/Y', strtotime($portaria->start_date)) }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 flex space-x-2">
                                                    <a href="{{ url('portarias/' . $portaria->id . '/detalhes') }}"
                                                        class="cursor-pointer flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>
                                                        <p>Detalhes</p>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- Quantidade de portarias ativas em % que o servidor participa --}}
{{-- Quantidade de portarias totais que o servidor participa --}}
{{-- Quantidade de portarias finalizadas que o servidor participa --}}
