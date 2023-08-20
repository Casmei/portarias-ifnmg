<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Editar {{ $gestor->name }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações que deseja editar do gestor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('gestores.update', ['id' => $gestor->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="gestor-name" :value="__('Nome do Gestor')" />
            <x-text-input id="gestor-name" name="name" type="text" :value="old('name', $gestor->name)" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" :value="old('cpf', $gestor->cpf)" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $gestor->email)" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Editar') }}</x-primary-button>
        </div>
    </form>
</section>
