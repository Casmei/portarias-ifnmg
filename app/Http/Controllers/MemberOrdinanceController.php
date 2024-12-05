<?php

namespace App\Http\Controllers;

use App\Models\Ordinance;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use DB;
use App\Enums\UserRole;
use App\Models\MemberOrdinance;

class MemberOrdinanceController extends Controller
{
    public function index()
    {
        $portarias = Ordinance::all()->sortByDesc('created_at')->where('visibility', true);

        return view('welcome', [
            'portarias' => $portarias
        ]);
    }
    
    /**
     * Search Name the specified ordinance from storage.
     */
    public function searchName()
    {
        $search = request('search');
        if ($search) {
            $portarias = Ordinance::where('number', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->paginate(10);
            return view('welcome', ['portarias' => $portarias]);
        } else {
            $portarias = User::where('role_id', UserRole::SERVIDOR)->paginate(10);
            return view('welcome', ['portarias' => $portarias]);
        }
    }
    public function listOrdinance(string $id)
    {
        $servidor = User::where('id', $id)->first();

        $portarias = User::select('users.*', 'ordinances.*')
            ->join('ordinance_user', 'users.id', '=', 'ordinance_user.user_id')
            ->join('ordinances', 'ordinances.id', '=', 'ordinance_user.ordinance_id')
            ->where('users.id', $servidor->id)
            ->where('ordinances.visibility', true)
            ->get();


        $porta = Ordinance::find($servidor->ordinances()->get());
        $totalPorta = $porta->count();

        $permanentes = Ordinance::select($servidor->id, 'ordinances')
            ->where('end_date', '=', null)
            ->get();

        $totalPermanentes = $permanentes->count();

        $naoPermanentes = Ordinance::select($servidor->id, 'ordinances')
            ->where('end_date', '!=',  null)
            ->get();



        $totalNaoPermanentes = $naoPermanentes->count();

        return view('servidor.listOrdinance', [
            'portarias' => $portarias,
            'servidor' => $servidor,
            'totalPorta' => $totalPorta,
            'totalPermanentes' => $totalPermanentes,
            'totalNaoPermanentes' => $totalNaoPermanentes
        ]);
    }
    public function ranking()
    {
        $search = request('search');
    
        if ($search) {
            $users = User::withCount('ordinances') ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%'); 
        })
        ->orderBy('ordinances_count', 'desc') 
        ->get();
        } else {
            $users = User::withCount('ordinances')
                         ->orderBy('ordinances_count', 'desc') 
                         ->get();
        }
    
        return view('portaria.ranking', ['users' => $users]);
    }
}