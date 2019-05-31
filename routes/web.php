<?php
use App\Usuario as Usuario;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/mostrar', 'MateriaController@mostrar')->name('mostrar');
Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/materias/create', 'MateriaController@store');
Route::resource("materia","MateriaController");

Route::get("/leer/{nombre}",function ($nombre){
    $usuarios=Usuario::where("nombre",$nombre)->get();
    foreach ($usuarios as $u){
        echo $u->nombre;
    }
});

Route::get("/leer",function (){
    $usuarios=Usuario::all();
    foreach ($usuarios as $u){
        echo $u->nombre;
    }
});
Route::get("/leerxmateria",function (){
    /*$datos =  DB::table('usuarios')
        ->join('materias_x_usuario', 'usuarios.id', '=', 'materias_x_usuario.id_usuario')
        ->join('materias', 'materias_x_usuario.id_materia', '=', 'materias.id')
        ->get();
    echo "<pre>";
    print_r($datos);
    echo "</pre>";*/

    $usuario=Usuario::find(1);
    print_r($usuario->materia);

});