<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Editar Servidor') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações que deseja editar do servidor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('servidores.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="servidor-name" :value="__('Nome do Servidor')" />
            <x-text-input id="servidor-name" name="name" type="text" value="Maria" class="mt-1 block w-full"/>
            <!-- TODO: Definir melhor a mensagem de erro! -->
            <!-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" value="123.456.789.00" class="mt-1 block w-full" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="maria@email.com" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> -->
        </div>

        <div>
            <x-input-label for="email" :value="__('Matrícula do Siapi')" />
            <x-text-input id="email" name="" type="text" class="mt-1 block w-full" value="maria@email.com" />
            <!-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> -->
        </div>

       
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Editar') }}</x-primary-button>
        </div>
    </form>
</section>
