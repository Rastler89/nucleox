<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Mold;

class TestController extends Controller
{
    public function show() {
        $mold = Mold::find(1);

        $mold->image = Storage::disk('public')->url($mold->image);

        return view('pdf.molde', ['mold' => $mold]);
    }
}
