<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Models\Ordinance;


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
        return view('portaria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
