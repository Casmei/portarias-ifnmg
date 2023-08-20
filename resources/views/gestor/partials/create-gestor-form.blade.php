<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adicionar Gestor') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações necessárias para adicionar um novo gestor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('gestores.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="gestor-name" :value="__('Nome do Gestor')" />
            <x-text-input id="gestor-name" name="name" type="text" placeholder="Ex: Maria" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" placeholder="123.456.789.00" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" placeholder="maria@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            <select id="cargo" name="position_id" class="mt-1  block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700">
                <option selected>Escolha o Cargo</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>
