<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ranking de Portarias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 " style="max-width: 86rem;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="lg:flex m-5 items-center">
                    <div class=" mb-5 lg:mb-0 grow lg:w-8/12 me-5">
                        <form action="{{ route('ranking.portarias') }}" method='post'>
                            @csrf
                            <label class="relative block">
                                <span class="sr-only">Search</span>
                                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#cbd5e1"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </span>
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-300 focus:ring-indigo-300 focus:ring-1 sm:text-sm"
                                    placeholder="Buscar servidor pelo nome" type="text" name="search" />
                            </label>
                        </form>
                    </div>

                </div>
                <div class="flex flex-col mx-5 overflow-x-hidden">
                    <div class="overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 pb-10">
                            <div class="overflow-auto">
                                @php $i = 1; @endphp
                                @if (isset($users) && !$users->isEmpty())
                                    <table class="w-full table-auto text-left text-sm font-light">
                                        <thead
                                            class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                            <tr>
                                                <th scope="col" class="px-6 py-4 text-center">POSIÇÃO</th>
                                                <th scope="col" class="px-6 py-4">SERVIDOR</th>
                                                <th scope="col" class="px-6 py-4 text-center">QUANTIDADE DE
                                                    PORTARIAS</th>
                                                <th scope="col" class="px-6 py-4 text-center">DETALHES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="border-b border-gray-100">
                                                    <td class="whitespace-nowrap px-10 py-4 text-center	">
                                                        {{ $i }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        {{ $user->name }}</td>
                                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                                        {{ $user->ordinances_count }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 flex justify-center items-center space-x-2">
                                                        <a href="{{ route('servidores.details', $user->id) }}"
                                                            class="flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-eye"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                                <path
                                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                            </svg>
                                                            <p>detalhes</p>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-center">Não há nenhum usuario cadastrado.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
