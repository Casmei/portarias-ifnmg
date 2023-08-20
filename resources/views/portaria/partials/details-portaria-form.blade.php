<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Detalhes da Portaria') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Informações sobre a portaria.') }}
        </p>
    </header>

    <div>
        <label class="font-bold" >Nome:</label>
        <p>{{ $portaria->number }}</p>
    </div>

    <div class='flex space-x-6'>
        <div>
            <label class="font-bold">Data Inicio:</label>
            <p>{{ $portaria->start_date }}</p>
        </div>

        <div>
            <label class="font-bold">Data Fim:</label>
            @if ($portaria->end_date)
                <p>$portaria->end_date</p>
            @else
                <p class = 'ml-6'>-</p>
            @endif
        </div>

    </div>

    <div>
        <label class="font-bold">Campus:</label>
        <p>{{ $portaria->campus }}</p>
    </div>

    <div>
        <label class="font-bold">Descricao da portaria:</label>
        <p>{{ $portaria->description }}</p>
    </div>

    <div>
        <label class="font-bold">Visibilidade:</label>
        @if ($portaria->visibility == 1)
            <p>Aberta</p>
        @else
            <p>Privada</p>
        @endif
    </div>

    <div class="flex items-center gap-4 mt-5">
        <x-primary-button>
            <a href="{{ route('ordinance.download', ['id' => $portaria->id]) }}"
                class="px-3 py-1">
                {{ __('Baixar Portaria') }}
            </a>
        </x-primary-button>
    </div>
</section>

