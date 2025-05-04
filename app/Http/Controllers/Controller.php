<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() 
    {
        return view('dashboard');
    }

    public function welcome() 
    {
        return view('welcome');
    }

    public function switchLocale(string $locale)
    {
        session()->put(compact('locale'));
        return back();
    }
}
