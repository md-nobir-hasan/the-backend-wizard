<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashView()
    {
        return view('backend.pages.dashboard');
    }
}
