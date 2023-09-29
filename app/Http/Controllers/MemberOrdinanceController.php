<?php

namespace App\Http\Controllers;

use App\Models\Ordinance;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class MemberOrdinanceController extends Controller
{
    public function index()
    {
        $servidores = User::select('users.*', DB::raw('COUNT(id) AS ordinances_count'))
            ->join('ordinance_user', 'users.id', '=', 'ordinance_user.user_id')
            ->groupBy('ordinance_user.user_id')
            ->get();

        return view('welcome', [
            'servidores' => $servidores
        ]);
    }
    public function listOrdinance(string $id){
        $servidor = User::where('id', $id)->first();

        $portarias = User::select('users.*','ordinances.*')
        ->join('ordinance_user', 'users.id', '=', 'ordinance_user.user_id')
        ->join('ordinances', 'ordinances.id', '=', 'ordinance_user.ordinance_id')
        ->where('users.id', $servidor->id)
        ->where('ordinances.visibility', true)
        ->get();


        $porta = Ordinance::find($servidor->ordinances()->get());
        $totalPorta = $porta->count();

        $permanentes = Ordinance::select($servidor->id, 'ordinances')
        ->where('end_date', '=' , null)
        ->get();

        $totalPermanentes = $permanentes->count();

        $naoPermanentes = Ordinance::select($servidor->id, 'ordinances')
        ->where('end_date', '!=' ,  null)
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
}
