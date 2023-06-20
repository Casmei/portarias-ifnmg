<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Editar {{ $servidor->name }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações que deseja editar do servidor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('servidores.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="servidor-name" :value="__('Nome do Servidor')" />
            <x-text-input id="servidor-name" name="name" type="text" :value="old('name', $servidor->name)" class="mt-1 block w-full"/>
            <!-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" :value="old('name', $servidor->cpf)" class="mt-1 block w-full" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('name', $servidor->email)" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="email" :value="__('Matrícula do Siapi')" />
            <x-text-input id="email" name="" type="text" class="mt-1 block w-full" value="teste" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> -->
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
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Editar') }}</x-primary-button>
        </div>
    </form>
</section>
