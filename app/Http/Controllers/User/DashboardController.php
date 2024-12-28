<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardControlLer extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
}