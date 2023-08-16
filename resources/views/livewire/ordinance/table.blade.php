<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="lg:flex m-5 items-center">
        <div class=" mb-5 lg:mb-0 grow lg:w-8/12 me-5">
                <label class="relative block">
                    <span class="sr-only">Search</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#cbd5e1" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input wire:model="searchTerm" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-300 focus:ring-indigo-300 focus:ring-1 sm:text-sm" placeholder="Buscar portaria pelo número" type="text"/>
                </label>
        </div>

        <div class="space-x-3 items-start flex justify-end">
            <a href="{{ route('ordinance.create') }}">
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
                            <th scope="col" class="px-6 py-4">CÓDIGO</th>
                            <th scope="col" class="px-6 py-4">CAMPUS</th>
                            <th scope="col" class="px-6 py-4">DATA</th>
                            <th scope="col" class="px-6 py-4">STATUS</th>
                            <th scope="col" class="px-6 py-4 text-center">VISIBILIDADE</th>
                            <th scope="col" class="px-6 py-4">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $portarias as $portaria )
                            <tr class="border-b border-gray-100">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $portaria->number }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $portaria->campus }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $portaria->startDateFormatted }} - {{ $portaria->endDateFormatted }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($portaria->status)
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-green-900 dark:text-green-300">Ativa</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-red-900 dark:text-red-300">Inativa</span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-center">
                                    @if ($portaria->visibility)
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-blue-900 dark:text-blue-300">Pública</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Privada</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 flex space-x-2">
                                    <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}" class="flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                        <p>Baixar</p>
                                    </a>
                                    <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}" class="flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                        </svg>
                                        <p>Abrir</p>
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
