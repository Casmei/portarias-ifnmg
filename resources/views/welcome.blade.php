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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <x-logo-img />
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="py-12 justify-center">
                <h1 class="text-center  mt-20 text-4xl">Portarias vigentes</h1>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-20">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-col mx-5">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full ">
                                    <div class="overflow-hidden text-center">
                                        <table class="min-w-full text-left text-sm font-light mx-auto">
                                            <thead class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                                <tr class=" bg-black text-white">
                                                    <th  scope="col" class="px-6 py-4 text-center">Número da Portaria</th>
                                                    <th scope="col" class="px-6 py-4 text-center">Descrição</th>
                                                    <th scope="col" class="px-6 py-4 text-center">Documento</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @php $i = 1 @endphp
                                                @foreach ($portarias as $portaria)
                                                    <tr class="border-b border-gray-100 text-center">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center text-center">
                                                            <a href="{{ route('servidor.listOrdinance', ['id' => $portaria->id]) }}">{{ $portaria->number ? $portaria->number : ' ' }}</a>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">
                                                            <a href="{{ route('servidor.listOrdinance', ['id' => $portaria->id]) }}">{{ $portaria->description }}</a>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}"
                                                                class="flex space-x-1 border px-3 py-1  border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase w-24">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-download"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                    <path
                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                </svg>
                                                                <p>Baixar</p>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @php $i++  @endphp
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
        </div>
    </body>
</html>
