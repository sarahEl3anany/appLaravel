<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($lang) {
        Session::put('lang', $lang);
        return back();
    }
}
