<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;

use App\Models\Service;
use App\Models\RecentWork;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();

        return view('welcome', compact('services', 'recentWorks'));
    }

    public function dashboard()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();

        return view('dashboard', compact('services', 'recentWorks'));
    }
}

