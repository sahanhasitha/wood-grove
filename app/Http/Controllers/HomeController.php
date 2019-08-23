<?php

namespace App\Http\Controllers;

use App\User;
use domain\Facades\CompanyFacade;
use domain\Facades\EventFacade;
use domain\Facades\ReservationFacade;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response['events'] = EventFacade::all();
        $response['companies'] = CompanyFacade::allCompany();
        $response['reservations'] = ReservationFacade::all();
        return view('home')->with($response);
    }

    public function users(){
        return view('users', ['users' => User::all()]);
    }
}
