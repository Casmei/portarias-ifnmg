<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Jobs\SendEmailJob;
use App\Models\Ordinance;
use App\Models\Position;
use App\Models\Funcao;
use App\Models\User;
use Carbon\Carbon;
use League\Csv\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        Gate::authorize('acesso-restrito-servidor');
        $servidores = User::where('role_id', UserRole::SERVIDOR)->paginate(10);
        return view('servidor.index', ['servidores' => $servidores]);

    }

      /**
     * Search Name the specified resource from storage.
     */
    public function searchName()
    {
        Gate::authorize('acesso-restrito-servidor');
        $search = request('search');
        if($search){
            $servidores = User::where([
                ['name','like','%'.$search.'%']
            ])->paginate(10);
            return view('servidor.index', ['servidores' => $servidores,'search' => $search]);
        }else{
            $servidores = User::where('role_id', UserRole::SERVIDOR)->paginate(10);
            return view('servidor.index', ['servidores' => $servidores]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        Gate::authorize('acesso-restrito-servidor');
        $positions = Position::all();
        $funcaos = Funcao::all();
        return view('servidor.create', [
            'positions' => $positions,
            'funcaos' => $funcaos
        ]);
    }

    /**
     * Show the form for upload a file.
     */
    public function renderUpload(): View
    {
        Gate::authorize('acesso-restrito-servidor');
        return view('servidor.upload');
    }

    /**
     * Upload data on database
     */
    public function uploadServer(Request $request)
    {
        Gate::authorize('acesso-restrito-servidor');
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $path = $file->store('csv_files');

            $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
            $csv->setHeaderOffset(0);

            foreach ($csv as $row) {
                $password = Str::random(10);

                $server = new User();
                $server->name = $row['name'];
                $server->email = $row['email'];
                $server->cpf = $row['cpf'];
                $server->password = Hash::make($password);
                $server->position_id = $row['position_id'];
                $server->funcao_id = $row['funcao_id'];
                $server->siape = $row['siape'];
                $server->save();

                SendEmailJob::dispatch($server, $password);
            }
        }

        return redirect()->route('servidores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('acesso-restrito-servidor');
        $request->validate(
            [
                'name'  => 'required|string',
                'email'  => 'required|email|unique:users',
                'cpf' => 'required|string|unique:users',
                'siape' => 'required|string|unique:users',
                'position_id' => 'required|numeric',
                'funcao_id' => 'required|numeric'

            ],
            [
                'name.required' => 'Campo nome é obrigatório.',
                'email.email' => 'Necessário um email válido.',
                'email.required' => 'Campo email é obrigatório.',
                'email.unique' => 'Esse e-mail já está sendo usado.',
                'cpf.required' => 'Campo cpf é obrigatório.',
                'cpf.unique' => 'Esse cpf já está cadastrado.',
                'siape.required' => 'Campo siape é obrigatório.',
                'siape.unique' => 'Esse siape já está cadastrado.',
                'position_id.numeric' => 'Selecione o cargo.',
                'funcao_id.numeric' => 'Selecione a função.'
            ]
        );

        $password = Str::random(10);

        $server = new User();
        $server->name = $request->input('name');
        $server->email = $request->input('email');
        $server->cpf = $request->input('cpf');
        $server->password = Hash::make($password);
        $server->position_id = $request->input('position_id');
        $server->funcao_id = $request->input('funcao_id');
        $server->siape = $request->input('siape');
        $server->save();

        SendEmailJob::dispatch($server, $password);

        return redirect()->route('servidores');
    }

    /**
     * Display the specified resource.
     */
    public function dashboard()
    {
        $user = auth()->user();

        if($user->role_id == UserRole::SERVIDOR) {
            $portarias = Ordinance::find($user->ordinances()->get());
            foreach ($portarias as $portaria) {
                $now = Carbon::now();
                $portaria->startDateFormatted = Carbon::parse($portaria->start_date)->format('d/m/Y');
                if ($portaria->end_date) {
                    $portaria->endDateFormatted = Carbon::parse($portaria->end_date)->format('d/m/Y');
                }

                if ($now->isBetween($portaria->start_date, $portaria->end_date)) {
                    $portaria->status = true;
                } else {
                    $portaria->status = false;
                }
            }


            return view('dashboard', [
                'portarias' => $portarias,
                'user' => $user,
            ]);
        }

        if($user->role_id == UserRole::ADMIN || $user->role_id == UserRole::GESTOR ) {
            $portarias = Ordinance::all();
            foreach ($portarias as $portaria) {
                $now = Carbon::now();
                $portaria->startDateFormatted = Carbon::parse($portaria->start_date)->format('d/m/Y');
                if ($portaria->end_date) {
                    $portaria->endDateFormatted = Carbon::parse($portaria->end_date)->format('d/m/Y');
                }

                if ($now->isBetween($portaria->start_date, $portaria->end_date)) {
                    $portaria->status = true;
                } else {
                    $portaria->status = false;
                }
            }

            $portarias = Ordinance::all();
            $totalPortarias = $portarias->count();
            $portariasAtivas = 0;
            $porcentagemAtivas = 0;
            $totalFinalizadas = 0;
            $porcentagemFinalizadas = 0;

            if($totalPortarias > 0) {

                $portariasAtivas = $portarias->filter(function ($portaria) {
                    return now()->lessThan($portaria->end_date);
                });

                $totalAtivas = $portariasAtivas->count();
                $porcentagemAtivas = ($totalAtivas / $totalPortarias) * 100;

                $portariasFinalizadas = $portarias->filter(function ($portaria) {
                    return $portaria->end_date && now()->greaterThanOrEqualTo($portaria->end_date);
                });

                $totalFinalizadas = $portariasFinalizadas->count();
                $porcentagemFinalizadas = ($totalFinalizadas / $totalPortarias) * 100;
            }

            return view('dashboard', [
                'portarias' => $portarias,
                'user' => $user,
                'totalPortarias' => $totalPortarias,
                'porcentagemAtivas' => number_format($porcentagemAtivas, 2),
                'totalFinalizadas' => $totalFinalizadas,
                'porcentagemFinalizadas' => number_format($porcentagemFinalizadas, 2),
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('acesso-restrito-servidor');
        $servidor = User::where('id', $id)->first();
        $positions = Position::all();
        $funcaos = Funcao::all();

        return view('servidor.edit', [
            'servidor' => $servidor,
            'positions' => $positions,
            'funcaos' => $funcaos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function details(string $id)
    {
        Gate::authorize('acesso-restrito-servidor');

        $servidor = User::where('id', $id)->first();

        $portarias = Ordinance::find($servidor->ordinances()->get());

        $totalPortarias = $portarias->count();
        $totalAtivas = 0;
        $porcentagemAtivas = 0;
        $totalFinalizadas = 0;
        $porcentagemFinalizadas = 0;

        if ($totalPortarias > 0) {
            $portariasAtivas = $portarias->filter(function ($portaria) {
                return now()->lessThan($portaria->end_date);
            });

            $totalAtivas = $portariasAtivas->count();
            $porcentagemAtivas = ($totalAtivas / $totalPortarias) * 100;

            $portariasFinalizadas = $portarias->filter(function ($portaria) {
                return $portaria->end_date && now()->greaterThanOrEqualTo($portaria->end_date);
            });

            $totalFinalizadas = $portariasFinalizadas->count();
            $porcentagemFinalizadas = ($totalFinalizadas / $totalPortarias) * 100;
        }

        $position = Position::where('id', $servidor->position_id)->first();
        $funcao = Funcao::where('id', $servidor->funcao_id)->first();

        return view('servidor.details', [
            'servidor' => $servidor,
            'position' => $position,
            'funcao' => $funcao,
            'portarias' => $portarias,
            'totalPortarias' => $totalPortarias,
            'totalAtivas' => $totalAtivas,
            'porcentagemAtivas' => number_format($porcentagemAtivas, 2),
            'totalFinalizadas' => $totalFinalizadas,
            'porcentagemFinalizadas' => number_format($porcentagemFinalizadas, 2),
        ]);
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('acesso-restrito-servidor');
        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'position_id' => 'required|numeric',
                'funcao_id' => 'required|numeric'
            ],
            [
                'name.required' => 'Campo nome é obrigatório',
                'position_id.numeric' => 'Selecione o cargo!',
                'funcao_id.numeric' => 'Selecione a função'
            ]
        );

        $newData = User::find($id);

        $newData->name = $validatedData['name'];
        $newData->position_id = $validatedData['position_id'];
        $newData->funcao_id = $validatedData['funcao_id'];

        $newData->save();

        return redirect()->route('servidores');
    }


    public function delete(string $id)
    {
        $servidor = User::where('id', $id)->first();
        return view('servidor.delete', compact('servidor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Gate::authorize('acesso-restrito-servidor');
        $servidor = User::findOrFail($id);

        if ($request->input('server-name') !== $servidor->name) {
            return redirect()->route('servidores');
        }


        $servidor->delete();

        return redirect()->route('servidores');
    }
}
