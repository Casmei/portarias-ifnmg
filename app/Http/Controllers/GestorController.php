<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Jobs\SendEmailJob;
use App\Models\Position;
use App\Models\User;
use League\Csv\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;


class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::authorize('acesso-permitido-admin');
        $gestores = User::where('role_id', UserRole::GESTOR)->paginate(10);
        return view('gestor.index', ['gestores' => $gestores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        Gate::authorize('acesso-permitido-admin');
        $positions = Position::all();
        return view('gestor.create', ['positions' => $positions]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('acesso-permitido-admin');
        $request->validate(
            [
                'name'  => 'required|string',
                'email'  => 'required|email',
                'cpf' => 'required|string',
            ],
            [
                'name.required' => 'Campo nome é obrigatório',
                'email.email' => 'Necessário um email válido',
                'email.required' => 'Campo email é obrigatório',
                'cpf.required' => 'Campo cpf é obrigatório',
            ]
        );

        $password = Str::random(10);

        $server = new User();
        $server->name = $request->input('name');
        $server->email = $request->input('email');
        $server->cpf = $request->input('cpf');
        $server->password = Hash::make($password);
        $server->role_id = UserRole::GESTOR;
        $server->save();

        SendEmailJob::dispatch($server, $password);

        return redirect()->route('gestores');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('acesso-permitido-admin');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('acesso-permitido-admin');
        $gestor = User::where('id', $id)->first();

        return view('gestor.edit', [
            'gestor' => $gestor,
        ]);
    }

    public function searchName()
    {
        Gate::authorize('acesso-permitido-admin');
        $search = request('search');
        if($search){
            $gestores = User::where([
                ['name','like','%'.$search.'%']
            ])
            ->where('role_id', UserRole::GESTOR)
            ->get();
            return view('gestor.index', ['gestores' => $gestores,'search' => $search]);
        }else{
            $gestores = User::where('role_id', UserRole::GESTOR)->paginate(10);
            return view('gestor.index', ['gestores' => $gestores]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('acesso-permitido-admin');
        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'cpf' => 'required|string',
            ],
            [
                'name.required' => 'Campo nome é obrigatório',
                'email.email' => 'Necessário um email válido',
                'email.required' => 'Campo email é obrigatório',
                'cpf.required' => 'Campo cpf é obrigatório',
            ]
        );

        $newData = User::find($id);

        $newData->name = $validatedData['name'];
        $newData->cpf = $validatedData['cpf'];
        $newData->email = $validatedData['email'];

        $newData->save();

        return redirect()->route('gestores');
    }

    public function delete(string $id)
    {
        $gestor = User::where('id', $id)->first();
        return view('gestor.delete', compact('gestor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('acesso-permitido-admin');
        $gestor = User::findOrFail($id);

        if ($request->input('server-name') !== $gestor->name) {
            return redirect()->route('gestores');
        }


        $gestor->delete();

        return redirect()->route('gestores');
    }
}
