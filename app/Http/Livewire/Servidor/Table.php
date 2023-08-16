<?php

namespace App\Http\Livewire\Servidor;

use App\Enums\UserRole;
use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $servidores = User::where('role_id', UserRole::SERVIDOR)
            ->whereRaw('LOWER(name) LIKE ?', [strtolower($searchTerm)])
            ->paginate(10);

        return view('livewire.servidor.table',
            compact('servidores')
        );
    }
}
