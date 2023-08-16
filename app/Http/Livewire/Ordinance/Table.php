<?php

namespace App\Http\Livewire\Ordinance;

use App\Models\Ordinance;
use Carbon\Carbon;
use Livewire\Component;

class Table extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $portarias = Ordinance::whereRaw('LOWER(number) LIKE ?', [strtolower($searchTerm)])
        ->paginate(10);

        foreach ($portarias as $portaria) {
            $now = Carbon::now();
            $portaria->startDateFormatted = Carbon::parse($portaria->start_date)->format('d/m/Y');
            $portaria->endDateFormatted = Carbon::parse($portaria->end_date)->format('d/m/Y');

            if ($now->isBetween($portaria->start_date, $portaria->end_date)) {
                $portaria->status = true;
            } else {
                $portaria->status = false;
            }
        }

        return view('livewire.ordinance.table',
            compact('portarias')
        );
    }
}
