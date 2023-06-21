<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servidores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="lg:flex m-5 items-center">
                    <div class=" mb-5 lg:mb-0 grow lg:w-8/12 me-5">
                        <form action="{{route('servidores.busca')}}" method='get'>
                            @csrf
                            <label class="relative block">
                                <span class="sr-only">Search</span>
                                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#cbd5e1" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </span>
                                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-300 focus:ring-indigo-300 focus:ring-1 sm:text-sm" placeholder="Buscar servidor" type="text" name="search"/>
                            </label>
                        </form>
                    </div>

                    <div class="space-x-3 items-start flex justify-end">
                        <a href="{{ route('servidores.upload') }}">
                            <x-secondary-button class="w-30">
                                <svg class='mr-2' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                {{ __('Importar CSV') }}
                            </x-primary-button>
                        </a>
                        <a href="{{ route('servidores.store') }}">
                            <x-primary-button class="w-30">
                                {{ __('Adicionar +') }}
                            </x-primary-button>
                        </a>
                    </div>

                </div>
                <div class="flex flex-col mx-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 pb-10">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nome</th>
                                    <th scope="col" class="px-6 py-4">CPF</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                    <th scope="col" class="px-6 py-4">SIAPI</th>
                                    <th scope="col" class="px-6 py-4">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ( $servidores as $servidor )
                                <tr class="border-b border-gray-100">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $servidor->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $servidor->cpf }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $servidor->email}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">1234.65-789</td>
                                    <a href="">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ url('servidores/'.$servidor->id.'/editar') }}">
                                                <x-icon-edit />
                                            </a>
                                        </td>
                                    </a>

                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        @if(request()->query('search') === null)
                            <footer class="mt-10">
                                {{ $servidores->links() }}
                            </footer>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
