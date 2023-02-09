<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    //show_dashboard
    public function show_dashboard (){

        return view('admin.dashboard');
    }

    //show_form
    public function show_form (){

        return view('admin.pages.form');
    }
    //show_table
    public function show_table (){

        return view('admin.pages.table');
    }

}
