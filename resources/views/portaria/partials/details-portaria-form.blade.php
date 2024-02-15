<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações sobre a portaria') }}
        </h2>
    </header>

    <div class="space-y-5 mt-10">
        <div>
            <x-input-label for="servidor-name" :value="__('Número da Portaria')" />
            <p>{{ $portaria->number }}</p>
        </div>

        <div class='flex space-x-6'>
            <div>
                <x-input-label for="cpf" :value="__('Data Inicio:')" />
                {{ $portaria->start_date }}
            </div>
            <div>
                <x-input-label for="cpf" :value="__('Data Fim:')" />
                @if ($portaria->end_date)
                    {{ $portaria->end_date }}
                @else
                    <p class='ml-6'>-</p>
                @endif
            </div>
        </div>



        <div>
            <x-input-label for="cpf" :value="__('Campus:')" />
            {{ $portaria->campus }}
        </div>

        <div>
            <x-input-label for="email" :value="__('Descricao da portaria:')" />
            {{ $portaria->description }}
        </div>

        <div>
            <x-input-label for="cargo" :value="__('Visibilidade:')" />
            @if ($portaria->visibility == 1)
                <p>Aberta</p>
            @else
                <p>Privada</p>
            @endif
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('Participantes:')" />
            @foreach ($servidores->users as $key => $servidor)
                {{ $servidor->name }} {{ $key == count($servidores->users) - 1 ? '' : '-' }}
            @endforeach
        </div>
    </div>

    <div class="flex items-center gap-4 mt-5">
        <x-primary-button>
            <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}" class="px-3 py-1">
                {{ __('Baixar Portaria') }}
            </a>
        </x-primary-button>
    </div>
</section>
