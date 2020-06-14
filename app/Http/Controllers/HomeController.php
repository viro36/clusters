<?php

namespace App\Http\Controllers;

use App\Appeal;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id === 1) {
            $appeals = Appeal::all();
            return view('departament', compact('user', 'appeals'));
        }
        $district = District::where('id', $user->district)->first();
        return view('home', ['user' => $user, 'district' => $district]);
    }
}
