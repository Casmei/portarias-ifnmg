<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Criar Portaria') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações necessárias para criar  uma nova portaria.') }}
        </p>
    </header>

    <form method="post" action="{{ route('ordinance.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="portaria-numero" :value="__('Numero da Portaria')" />
            <x-text-input id="portaria-numero" name="numero-portaria" type="text" placeholder="Ex: Numero da Portaria" class="mt-1 block w-full"/>
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
        </div>

        <div class='flex space-x-5'>
            <div>
                <x-input-label for="date-start" :value="__('Data Inicio')" />
                <x-text-input id="date-start" name="date-start" type="date"/>
                {{-- <x-input-error :messages="$errors->get('cpf')" class="mt-2" /> --}}
            </div>
            <div>
                <x-input-label for="date-start" :value="__('Data Fim')" />
                <x-text-input id="date-start" name="date-start" type="date"/>
                {{-- <x-input-error :messages="$errors->get('cpf')" class="mt-2" /> --}}
            </div>
        </div>

        <div>
            <x-input-label for="campus-ou-reitoria" :value="__('Campus ou Reitoria')" />
            <x-text-input id="campus-ou-reitoria" name="campus-ou-reitoria" type="text" class="mt-1 block w-full" placeholder="Campus ou Reitoria" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <div>
            <x-input-label for="email" :value="__('Descrição')" />
            <textarea class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full' rows="4"  id="description" name="description" placeholder="Descrição" > 

            </textarea>
            {{-- <x-input-error :messages="$errors->get('siapi')" class="mt-2" /> --}}
        </div>
        <div>
            <x-input-label for="arquivo" :value="__('Carregue um PDF referente a portaria')" />
            <form method="post" action="{{ route('ordinance.create') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                <label class="block">
                    <input name="csv_file" type="file" class="
                    block w-full text-sm text-gray-600
                    file:uppercase file:tracking-widest
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-xs file:font-semibold
                    file:border-0 file:bg-indigo-400
                    file:text-white hover:file:bg-indigo-600
                    "/>
                </label>
            </form>
        </div>

        <div class="flex items-center gap-4 mt-10">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>