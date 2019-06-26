<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $alert=null;
        return view('layouts.contact',compact('alert'));

    }
}
