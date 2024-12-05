<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/mistral-ui@1.x.x/dist/cdn.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/mistral-ui@1.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <x-logo-img />
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="py-12 justify-center">
            <h1 class="text-center mt-20 text-4xl text-gray-800 mb-6">Portarias Vigentes</h1>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="lg:flex m-5 items-center">
                        <div class=" mb-5 lg:mb-0 grow lg:w-8/12 me-5">
                            <form action="{{ route('welcome.search') }}" method='post'>
                                @csrf
                                <label class="relative block">
                                    <span class="sr-only">Search</span>
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#cbd5e1" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </span>
                                    <input
                                        class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-300 focus:ring-indigo-300 focus:ring-1 sm:text-sm"
                                        placeholder="Buscar Portarias pelo nome ou descrição" type="text"
                                        name="search" />
                                </label>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col mx-5">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 pb-10">
                                <div class="overflow-hidden">
                                    @if (isset($portarias) && !$portarias->isEmpty())
                                        <table class="min-w-full text-left text-sm font-light ">
                                            <thead
                                                class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">CÓDIGO</th>
                                                    <th scope="col" class="px-6 py-4">CAMPUS</th>
                                                    <th scope="col" class="px-6 py-4">DATA DE INÍCIO</th>
                                                    <th scope="col" class="px-6 py-4">DATA DE FIM</th>
                                                    <th scope="col" class="px-6 py-4">STATUS</th>
                                                    <th scope="col" class="px-6 py-4 text-center">VISIBILIDADE</th>
                                                    <th scope="col" class="px-6 py-4">AÇÕES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($portarias as $portaria)
                                                    <tr class="border-b border-gray-100">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $portaria->number }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">{{ $portaria->campus }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($portaria->start_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($portaria->end_date)->format('d/m/Y') ?? '-' }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            @if ($portaria->status)
                                                                <span
                                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-green-900 dark:text-green-300">Ativa</span>
                                                            @else
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-red-900 dark:text-red-300">Inativa</span>
                                                            @endif
                                                        </td>

                                                        <td class="whitespace-nowrap px-6 py-4 text-center">
                                                            @if ($portaria->visibility)
                                                                <span
                                                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-blue-900 dark:text-blue-300">Pública</span>
                                                            @else
                                                                <span
                                                                    class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-3 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Privada</span>
                                                            @endif
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 flex space-x-2">
                                                            <a href="./portarias/{{ $portaria->id }}/detalhes"
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
                                                            <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}"
                                                                class="flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-download" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                    <path
                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                </svg>
                                                                <p>Baixar</p>
                                                            </a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="text-center">Não há nenhuma portaria cadastrada.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            let input = document.getElementById("search");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("ordinanceTable");
            let tr = table.getElementsByTagName("tr");
            let noResults = document.getElementById("noResults");
            let found = false;

            for (let i = 1; i < tr.length; i++) {
                let tdNumber = tr[i].getElementsByTagName("td")[0];
                let tdDescription = tr[i].getElementsByTagName("td")[1];
                if (tdNumber || tdDescription) {
                    let txtValueNumber = tdNumber.textContent || tdNumber.innerText;
                    let txtValueDescription = tdDescription.textContent || tdDescription.innerText;
                    if (txtValueNumber.toLowerCase().indexOf(filter) > -1 || txtValueDescription.toLowerCase().indexOf(
                            filter) > -1) {
                        tr[i].style.display = "";
                        found = true;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            // Exibir mensagem de "nenhum resultado encontrado"
            if (found) {
                noResults.style.display = "none";
            } else {
                noResults.style.display = "block";
            }
        }
    </script>
</body>

</html>
