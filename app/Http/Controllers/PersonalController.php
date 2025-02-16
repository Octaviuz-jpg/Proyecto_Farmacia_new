<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Personal;
use App\Models\Sucursal;



class PersonalController extends Controller
{
    public function index(){
        $personal = Personal::all();
        return view('personal', compact('personal'));
    }
}
