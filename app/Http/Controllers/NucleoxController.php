<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NucleoxController extends Controller
{
    public function work($slug) {
        //consultar la pagina por slug

        return view('layouts.public', ['config' => obtenerConfiguraciones()]);
    }
}
