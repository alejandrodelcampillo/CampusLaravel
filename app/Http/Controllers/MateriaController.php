<?php

namespace App\Http\Controllers;
use App\Materia as materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
            $materia->description = $request->get('descripcion');
            $materia->image_url = $request->get('imagen');
            $materia->clave = $request->get('pass');
            $materia->save();
            $idmateria = DB::getPdo()->lastInsertId();
            MateriasUsersController::guardar($idmateria,$iduser);
            return redirect('/home');
        }

    }

    public function modify(int $id){
        $datos =  DB::table('users')
            ->join('materias_users', 'users.id', '=', 'materias_users.user_id')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('users.type','=','2')
            ->get();
        return view('layouts/editallsubjectview',compact('datos','id'));
    }

    public function show($id)
    {

    }


    public function mostrar()
    {
        $datos =  DB::table('users')
            ->join('materias_users', 'users.id', '=', 'materias_users.user_id')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('users.type','=','2')
            ->get();
        if(Auth::user()->type == 3){
            return view('layouts.allsubjectview',compact('datos'));
        }else{
            return HomeController::index();
        }

    }

    public function save(Request $request){
        $newMateriaName = $request->get('name_m');
        $newProfesorName = $request->get('name');
        $profesorID = DB::table('users')
            ->where('email','=',$newProfesorName)
            ->get('id');

        if($newMateriaName==null){
            DB::table('materias_users')
                ->join('users','users.id','=','materias_users.user_id')
                ->where('subject_id','=',$request->get('id'))
                ->where('type','=','2')
                ->update(['user_id'=>$profesorID[0]->id]);
        }elseif($newProfesorName==null){
            DB::table('materias')
                ->where('id','=',$request->get('id'))
                ->update(['name_m'=>$newMateriaName]);
        }else{
            DB::table('materias')
                ->where('id','=',$request->get('id'))
                ->update(['name_m'=>$newMateriaName]);

            DB::table('materias_users')
                ->join('users','users.id','=','materias_users.user_id')
                ->where('subject_id','=',$request->get('id'))
                ->where('type','=','2')
                ->update(['user_id'=>$profesorID[0]->id]);
        }

        return redirect('mostrar');
    }


    public function mostrardetalle(Request $request){

        $dato =  DB::table('materias')
           ->where('id','=',$request->id)
            ->get();
        return view('layouts.materia',compact('dato'));
    }

    public function verificarpass(Request $request){
        $datito= $request->get('dato');
        $dato =  DB::table('materias_users')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('materias_users.subject_id','=',$datito)
            ->where('materias_users.user_id','=',Auth::user()->id)
            ->get();
        if(count($dato)==0){
            $alert=false;
            $arrai=['alert'=> $alert,'idparam'=> $datito];

           return view('layouts.passwordform',compact('arrai'));
        }else{
            $files = FileController::show($datito);
            $arrai=['dato'=> $dato,'file'=> $files];
            return view('layouts.materia',compact('arrai'));
        }

        //return view('layouts.pruebamateria',compact('dato'));
    }
    public static function getmateriaid($id){
        $dato =  DB::table('materias_users')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('materias_users.subject_id','=',$id)
            ->where('materias_users.user_id','=',Auth::user()->id)
            ->get();
        return $dato;
    }

    public static function getmateriaprofe(){
        $datos =  DB::table('materias_users')
            ->join('users','materias_users.user_id','=','users.id')
            ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
            ->where('materias_users.user_id','=',Auth::user()->id)
            ->get();

        return view('layouts.allsubjectview',compact('datos'));
    }
    public function verificacion(Request $request){
        $inputs=Input::all();
        $materia = new Materia();


        $materia =  DB::table('materias')
            ->where('materias.id','=',$inputs['idmateria'])
            ->get();
        $pass=$materia[0]->clave;

        if($pass==$inputs['passmateria']){

            MateriasUsersController::guardar($inputs['idmateria'],Auth::user()->id);
            $dato =  DB::table('materias_users')
                ->join('materias', 'materias_users.subject_id', '=', 'materias.id')
                ->where('materias_users.subject_id','=',$inputs['idmateria'])
                ->where('materias_users.user_id','=',Auth::user()->id)
                ->get();
            $files = FileController::show($inputs['idmateria']);
            $arrai=['dato'=> $dato,'file'=> $files];
            return view('layouts.materia',compact('arrai'));
        }else{
            $alert=true;
            $arrai=['alert'=> $alert,'idparam'=> $inputs['idmateria']];
            return view('layouts.passwordform',compact('arrai'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
