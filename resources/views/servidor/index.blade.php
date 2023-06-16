<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servidores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-5">
                    <div class="grow w-8/12 me-5">
                        <label class="relative block">
                            <span class="sr-only">Search</span>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
                            </span>
                            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search for anything..." type="text" name="search"/>
                        </label>
                    </div>
                    <div class="">
                        <x-primary-button class="w-30">
                            {{ __('Add +') }}
                        </x-primary-button>
                    </div>
                </div>
                <div class="flex flex-col mx-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nome</th>
                                    <th scope="col" class="px-6 py-4">CPF</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-slate-400">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">Maria Francisca da Silva Josefina de Jesus</td>
                                    <td class="whitespace-nowrap px-6 py-4">123456789-0</td>
                                    <td class="whitespace-nowrap px-6 py-4">francisquinha.vdl@email.com</td>
                                </tr>
                                <tr class="border-b dark:border-slate-400">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">Jose da Silva Ferreira</td>
                                    <td class="whitespace-nowrap px-6 py-4">123456789-0</td>
                                    <td class="whitespace-nowrap px-6 py-4">jose@email.com</td>
                                </tr>
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
