<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{

    public function index(){
        $datos =  DB::table('users')
            ->join('materias_users', 'users.id', '=', 'materias_users.user_id')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('users.type','=','2')
            ->get();
        return view('welcome',compact('datos'));
    }
}