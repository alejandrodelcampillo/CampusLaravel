<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MateriasUsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Materia as materia;
class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alert=null;
        return view('formmateria',compact('alert'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getidbymail($mail){
        $dato= DB::table('users')->where('users.email','=',$mail)->get('users.id');
        return $dato;
    }
    public function store(Request $request)
    {

        $iduser = $this->getidbymail($request->get('mail'));
        $iduser = substr($iduser,7,-2);
        if(empty($iduser) or is_null($iduser)){
            $alert=true;
            return view('formmateria',compact('alert'));
        }else{
            $materia = new Materia;
            $materia->name_m = $request->get('materia');
            $materia->save();
            $idmateria = DB::getPdo()->lastInsertId();
            MateriasUsersController::guardar($idmateria,$iduser);
            return redirect('/home');
        }


    }

    public function show($id)
    {

    }


    public function mostrar()
    {
        $datos =  DB::table('users')
            ->join('materias_users', 'users.id', '=', 'materias_users.user_id')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->get();
        return view('layouts.allsubjectview',compact('datos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
