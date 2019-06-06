<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('layouts.userform',compact('users'));
    }

    public function modify(int $id){
        $users = DB::table('users')->get();
        return view('layouts/edituser',compact('users','id'));
    }

    public function save(Request $request){
        $newType = $request->get('type');
        $newEmail = $request->get('email');
        DB::table('users')
            ->where('id','=',$request->get('id'))
            ->update(['type'=>$newType, 'email'=>$newEmail]);
        return redirect('user');
    }

    public function delete(int $id){
        DB::table('users')
            ->where('id','=',$id)
            ->delete();
        return redirect('user');
    }
}
