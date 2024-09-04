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
        $portarias = Ordinance::all()->sortByDesc('created_at')->where('visibility', true);

        return view('welcome', [
            'portarias' => $portarias
        ]);
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
}
