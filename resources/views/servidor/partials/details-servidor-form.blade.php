<section>
    <header class="mb-4">
        <h2 class="text-lg font-medium text-gray-900">
            Detalhes do servidor {{ $servidor?->name }}
        </h2>
    </header>

    <div class="space-y-5 mt-10">
        <div>
            <x-input-label for="servidor-name" :value="__('Nome do Servidor')" />
            <p>{{ $servidor?->name }}</p>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            {{ $servidor->cpf }}
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            {{ $servidor->email }}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            {{ $position->name ?? '' }}
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cargo" :value="__('SIAPE')" />
            {{ $servidor->siape }}
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>
    </div>
</section>
