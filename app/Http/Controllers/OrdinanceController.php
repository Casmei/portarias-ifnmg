<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\MemberOrdinance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Models\Ordinance;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class OrdinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::authorize('acesso-restrito-servidor');

        return view('portaria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servidores = User::where('role_id', UserRole::SERVIDOR)->get();
        return view('portaria.create', ['servidores' => $servidores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ordinance = new Ordinance();
        $ordinance->ordinance_number = $request->input('ordinance_number');
        $ordinance->start_date = $request->input('start_date');
        $ordinance->end_date = $request->input('end_date');
        $ordinance->campus = $request->input('campus');
        $ordinance->description = $request->input('description');
        $ordinance->pdf_url = 'portarias';
        $ordinance->visibility = true;
        $ordinance->save();

        $servidores = $request->input('servidores');
        $ordinance->users()->sync($servidores);
        return redirect()->route('ordinance');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portaria = Ordinance::where('id', $id)->first();
        // $positions = Position::all();

        // return view('ordinance.edit', compact('portaria'));

        return view('portaria.edit', [
            'portaria' => $portaria,
            // 'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
