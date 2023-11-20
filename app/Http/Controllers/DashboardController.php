<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('be.dashboard');
    }
    public function addMenus()
    {
        return view('be.addmenus');
    }
    public function dishes()
    {
        return view('be.dishes');
    }
    public function orders()
    {
        return view('be.orders');
    }
}
