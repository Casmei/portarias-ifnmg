<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Editar {{ $servidor->name }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações que deseja editar do servidor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('servidores.update', ['id' => $servidor->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="servidor-name" :value="__('Nome do Servidor')" />
            <x-text-input id="servidor-name" name="name" type="text" :value="old('name', $servidor->name)" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" :value="old('cpf', $servidor->cpf)" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $servidor->email)" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="siape" :value="__('Matrícula do SIAPE')" />
            <x-text-input id="siape" name="siape" type="text" class="mt-1 block w-full" :value="old('siape', $servidor->siape)" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            <select id="cargo" name="position_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700">
                <option value="">Escolha o Cargo</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ old('position_id', $servidor->position_id) == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="funcao" :value="__('Função')" />
            <select id="funcao" name="funcao_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700">
                <option value="">Escolha a Função</option>
                @foreach ($funcaos as $funcao)
                    <option value="{{ $funcao->id }}" {{ old('position_id', $servidor->funcao_id) == $funcao->id ? 'selected' : '' }}>
                        {{ $funcao->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Editar') }}</x-primary-button>
        </div>
    </form>
</section>
