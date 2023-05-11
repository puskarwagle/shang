<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RecentWorksController;
use App\Http\Controllers\ExploreTechsController;

use App\Models\Service;
use App\Models\RecentWork;
use App\Models\ExploreTech;

class HomeController extends Controller
{
    public function welcome()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();
        $exploreTechs = ExploreTech::all();
        return view('welcome', compact('services', 'recentWorks', 'exploreTechs'));
    }

    public function dashboard()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();
        $exploreTechs = ExploreTech::all();
        return view('dashboard', compact('services', 'recentWorks', 'exploreTechs'));
    }
}

