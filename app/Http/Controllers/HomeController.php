<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $info = [
            'refferals' => $user->refferals->count()
        ];
        return render('home')->with(compact('info'));
    }
}
