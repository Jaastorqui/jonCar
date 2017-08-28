<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LocalizationController extends Controller
{
    //
    public function index (Request $request) {
        if ($request->lang <> "") {
            app()->setLocate($request->lang);
        }
        echo trans("text.idioma_es");
        //return redirect('/');
    }
}
