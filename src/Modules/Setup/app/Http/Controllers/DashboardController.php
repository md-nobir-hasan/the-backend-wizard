<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function dashView()
    {
        return view('backend.pages.dashboard');
    }
}
