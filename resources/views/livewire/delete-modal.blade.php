<div>
    <a class="cursor-pointer" wire:click="confirmDelete('{{ $serverId }}', '{{ $serverName }}')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg>
    </a>

    @if($isOpen)
        <div
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
            style="display: {{ true ? 'block' : 'none' }};"
        >
            <div
                class="fixed inset-0 transform transition-all"
            >
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div
                class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-4xl sm:mx-auto"
            >
                <form method="post" action="{{ route('servidores.destroy', ['id' => $serverId]) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 select-none">
                        Você tem certeza que deseja deletar a conta de <u class="font-semibold" >{{ $serverName }}</u>?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Uma vez deletada, não será possível desfazer essa ação. Por segurança, digite o nome do servidor que deseja deletar!') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Nome do Servidor a ser Deletado') }}"  />

                        <x-text-input
                            id="server-name"
                            name="server-name"
                            type="text"
                            class="mt-1 block w-3/4"
                            placeholder="{{ $serverName }}"
                        />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button wire:click="closeModal">
                            {{ __('Cancelar') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Deletar') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>

    @endif
</div>
