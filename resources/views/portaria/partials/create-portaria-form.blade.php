<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Criar Portaria') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações necessárias para criar  uma nova portaria.') }}
        </p>
    </header>

    <form method="post" action="{{ route('ordinance.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="ordinance_number" :value="__('Numero da Portaria')" />
            <x-text-input id="ordinance_number" name="ordinance_number" type="text" placeholder="Ex: 123456"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('ordinance_number')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="end_date_visibility" class="inline-flex items-center">
                <input id="end_date_permanente" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="end_date_permanente">
                <span class="ml-2 text-sm text-gray-600">{{ __('Essa portaria é permanente?') }}</span>
            </label>
            <x-input-error :messages="$errors->get('end_date_visibility')" class="mt-2" />
        </div>

        <div class='flex space-x-6'>
            <div>
                <x-input-label for="start_date" :value="__('Data de Inicio')" />
                <x-text-input id="start_date" name="start_date" type="date" />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>


            <div id="end-date-container">
                <x-input-label for="end_date" :value="__('Data de Fim')" />
                <x-text-input id="end_date" name="end_date" type="date" />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>
        </div>



        <div>
            <x-input-label for="campus" :value="__('Campus ou Reitoria')" />
            <x-text-input id="campus" name="campus" type="text" class="mt-1 block w-full"
                placeholder="IFNMG - Campus Almenara" />
            <x-input-error :messages="$errors->get('campus')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="servidores" :value="__('Servidores participantes da portaria')" />
            <div x-data="multiselect" class="font-medium text-sm text-gray-700">
                <select multiple id="servidores" name="servidores[]">
                    <optgroup label="Servidores">
                        @foreach ($servidores as $servidor)
                            <option value="{{ $servidor->id }}">{{ $servidor->name }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <x-input-error :messages="$errors->get('servidores')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="servidores" :value="__('Descreva a portaria')" />
            <textarea class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'
                cols="4" id="description" name="description"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="file" :value="__('Carregue um PDF referente a portaria')" />
            <label class="block">
                <input id="file" name="pdf_file" type="file" accept="application/pdf"
                    class="
                mt-1
                block w-full text-sm text-gray-600
                file:uppercase file:tracking-widest
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-xs file:font-semibold
                file:border-0 file:bg-indigo-400
                file:text-white hover:file:bg-indigo-600
                " />
            </label>
            <x-input-error :messages="$errors->get('pdf_file')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" checked
                    name="visibility">
                <span class="ml-2 text-sm text-gray-600">{{ __('Essa portaria é visível ao público?') }}</span>
            </label>
            <x-input-error :messages="$errors->get('visibility')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-10">
            <x-primary-button id='btn-save'>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>

<script>
    const checkbox = document.getElementById('end_date_permanente');
    const endDateContainer = document.getElementById('end-date-container');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            endDateContainer.style.display = 'none';
        } else {
            endDateContainer.style.display = 'block';
        }
    });

    const file = document.getElementById('file');
    const btnSAve = document.getElementById('btn-save');

    file.addEventListener('change', function() {
        if (this.checked == '') {
            btnSAve.style.display = 'block';
        } else {
            btnSAve.style.display = 'none';
        }
    });
</script>
