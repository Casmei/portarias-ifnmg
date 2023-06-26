<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{
    public $isOpen = false;
    public $serverName;
    public $serverId;


    public function confirmDelete($serverId, $serverName)
    {
        $this->serverId = $serverId;
        $this->serverName = $serverName;
        $this->showModal();
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
