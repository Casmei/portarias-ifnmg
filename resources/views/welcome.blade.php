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
                        <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="py-12 justify-center">
                <h1 class="text-center  mt-20 text-4xl">Ranking de portarias</h1>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-20">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-col mx-5">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full ">
                                    <div class="overflow-hidden text-center">
                                        <table class="min-w-full text-left text-sm font-light mx-auto">
                                            <thead class="border-b font-semibold text-gray-800 leading-tight border-gray-200">
                                                <tr class=" bg-black text-white">
                                                    <th  scope="col" class="px-6 py-4 text-center"> Posição</th>
                                                    <th scope="col" class="px-6 py-4 text-center">Nome do Servidor</th>
                                                    <th scope="col" class="px-6 py-4 text-center">Quantidade de portarias</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @php $i = 1 @endphp
                                                @foreach ($servidores as $servidor)
                                                    <tr class="border-b border-gray-100 text-center">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center text-center">
                                                            <a href="{{ route('servidor.listOrdinance', ['id' => $servidor->id]) }}">{{ $i }}</a>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">
                                                            <a href="{{ route('servidor.listOrdinance', ['id' => $servidor->id]) }}">{{ $servidor->name }}</a>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <a href="{{ route('servidor.listOrdinance', ['id' => $servidor->id]) }}">{{ $servidor->ordinances_count }}</a>
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
