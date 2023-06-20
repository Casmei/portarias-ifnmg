<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use App\Notifications\ServerCredentialsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('servidor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $positions = Position::all();
        return view('servidor.create', ['positions' => $positions]);
    }

    /**
     * Show the form for upload a file.
     */
    public function renderUpload(): View
    {
        return view('servidor.upload');
    }

    /**
     * Show the form for upload a file.
     */
    public function uploadServer()
    {
        return redirect()->route('servidores');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = Str::random(10); // Gera uma senha aleatória de 10 caracteres

        $server = new User();
        $server->name = $request->input('name');
        $server->email = $request->input('email');
        $server->cpf = $request->input('cpf');
        $server->password = Hash::make($password);
        $server->position_id = $request->input('position_id');
        $server->save();

        SendEmailJob::dispatch($server, $password);

        return redirect()->route('servidores');
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
        return view('servidor.edit');
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
