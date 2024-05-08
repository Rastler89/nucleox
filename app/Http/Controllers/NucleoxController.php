<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class NucleoxController extends Controller
{
    public function work($slug) {
        //consultar la pagina por slug

        $page = Page::where('identifier','=',$slug)->first();

        $menus = Menu::where('is_active','=',1)->get();

        return view('layouts.public', [
            'config' => obtenerConfiguraciones(),
            'page' => $page,
            'menus' => $menus
        ]);
    }
}
