<?php

namespace App\Http\Controllers;

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
}
