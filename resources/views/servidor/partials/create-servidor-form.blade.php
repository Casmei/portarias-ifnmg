<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adicionar Servidor') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Forneça as informações necessárias para adicionar um novo servidor.') }}
        </p>
    </header>

    <form method="post" action="{{ route('servidores.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="servidor-name" :value="__('Nome do Servidor')" />
            <x-text-input id="servidor-name" name="name" type="text" placeholder="Maria" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                placeholder="maria@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="siape" :value="__('Matrícula do SIAPE')" />
            <x-text-input id="siape" name="siape" type="text" class="mt-1 block w-full"
                placeholder="12345678" />
            <x-input-error :messages="$errors->get('siape')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            <select id="cargo" name="position_id"
                class="mt-1  block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700">
                <option selected>Escolha o Cargo</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="funcao" :value="__('Função')" />
            <select id="funcao" name="funcao_id"
                class="mt-1  block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700">
                <option selected>Escolha a Função</option>
                @foreach ($funcaos as $funcao)
                    <option value="{{ $funcao->id }}">{{ $funcao->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('function_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
