<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        $apartments = Apartment::all();

        $user = User::all();
        return view('web.home' , compact( 'user','apartments'));
    }
}
