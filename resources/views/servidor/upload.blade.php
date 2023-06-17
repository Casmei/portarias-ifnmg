<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar servidor via CSV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('servidores') }}">
                <x-return-button class="w-30" />
            </a>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Upload de arquivo') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Forneça um arquivo csv contendo informações dos servidores.') }}
                    </p>
                </header>

                <form method="post" action="{{ route('servidores.upload') }}" class="mt-6 space-y-6">
                    @csrf
                    <label class="block">
                        <input type="file" class="
                        block w-full text-sm text-gray-600
                        file:uppercase file:tracking-widest
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-xs file:font-semibold
                        file:border-0 file:bg-indigo-400
                        file:text-white hover:file:bg-indigo-600
                        "/>
                    </label>

                    <div class="flex items-center gap-4">
                        <x-primary-button>
                            <svg class='mr-2' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            {{ __('Fazer upload') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
