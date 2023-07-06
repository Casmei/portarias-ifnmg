<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 select-none">
            Você tem certeza que deseja deletar a conta de <u class="font-semibold" >{{ $servidor->name }}</u>?
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez deletada, não será possível desfazer essa ação. Por segurança, digite o nome do servidor que deseja deletar!') }}
        </p>
    </header>


        <form method="post" action="{{ route('servidores.destroy', ['id' => $servidor->id]) }}" >
            @csrf
            @method('delete')


            <div class="mt-6">
                <x-input-label for="server_name" value="{{ __('server_name') }}" class="sr-only" />

                <x-text-input
                    id="server-name"
                    name="server-name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ $servidor->name }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex ">
                <x-secondary-button>
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Deletar servidor') }}
                </x-danger-button>
            </div>
        </form>
</section>
