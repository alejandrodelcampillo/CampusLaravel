<?php

namespace App\Http\Controllers;
use App\File as file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{

    public function store(Request $request)
    {		
            $file = new File;
            $file->subject_id = $request['subject_id'];
            $file->file_title = $request['file_title'];
            $file->file_name = $request['fileToUpload']->getClientOriginalName();
          	$file->save();
            $request->file('fileToUpload')->storeAs('public', $request['fileToUpload']->getClientOriginalName());

           /* $dato=MateriaController::getmateriaid($request['subject_id']);
            $files = FileController::show($request['subject_id']);
            $arrai=['dato'=> $dato,'file'=> $files];
             return view('layouts.materia',compact('arrai'));*/
        return back();


    }
    public static function show($idmateria){
            $files =  DB::table('files')->where('files.subject_id','=',$idmateria)->get();
        return $files;
    }

    }
