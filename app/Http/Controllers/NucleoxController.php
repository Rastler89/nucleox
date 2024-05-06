<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class NucleoxController extends Controller
{
    public function work($slug) {
        //consultar la pagina por slug

        $page = Page::where('identifier','=',$slug)->first();


        return view('layouts.public', [
            'config' => obtenerConfiguraciones(),
            'page' => $page
        ]);
    }
}
