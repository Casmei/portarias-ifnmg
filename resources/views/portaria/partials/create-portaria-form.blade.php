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
            <x-input-label for="ordinance_number" :value="__('Numero da Portaria')" />
            <x-text-input id="ordinance_number" value="1234" name="ordinance_number" type="text" placeholder="Ex: 123456" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->get('ordinance_number')" class="mt-2" />
        </div>

        <div class='flex space-x-6'>
            <div>
                <x-input-label for="start_date" :value="__('Data de Inicio')" />
                <x-text-input id="start_date" value="10/10/2003" name="start_date" type="date"/>
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="end_date" :value="__('Data de Fim')" />
                <x-text-input id="end_date" value="10/10/2003" name="end_date" type="date" />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="campus" :value="__('Campus ou Reitoria')" />
            <x-text-input id="campus" value="Teste" name="campus" type="text" class="mt-1 block w-full" placeholder="IFNMG - Campus Almenara" />
            <x-input-error :messages="$errors->get('campus')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="servidores" :value="__('Servidores participantes da portaria')" />
            <div x-data="multiselect" class="font-medium text-sm text-gray-700">
                <select multiple id="servidores" name="servidores[]">
                  <optgroup label="Servidores">
                    @foreach ($servidores as $servidor)
                        <option value="{{$servidor->id}}">{{$servidor->name}}</option>
                    @endforeach
                  </optgroup>
                </select>
              </div>
            <x-input-error :messages="$errors->get('servidores')" class="mt-2" />

        </div>



        <div>
            <x-input-label for="description" :value="__('Descrição')" />
            <textarea class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full' value="Teste" cols="4"  id="description" name="description" ></textarea>
            <x-input-error :messages="$errors->get('description')"  class="mt-2" />
        </div>
        <div>
            <x-input-label for="file" :value="__('Carregue um PDF referente a portaria')" />
            <label class="block">
                <input id="file" name="pdf_file" type="file" accept="application/pdf" class="
                mt-1
                block w-full text-sm text-gray-600
                file:uppercase file:tracking-widest
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-xs file:font-semibold
                file:border-0 file:bg-indigo-400
                file:text-white hover:file:bg-indigo-600
                "/>
            </label>
        </div>




        <div class="flex items-center gap-4 mt-10">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>
