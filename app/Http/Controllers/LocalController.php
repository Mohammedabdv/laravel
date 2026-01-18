<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalController extends Controller
{
    public function changeLanguage($locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
