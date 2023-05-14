<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\ServicesController;
// use App\Http\Controllers\RecentWorksController;
// use App\Http\Controllers\ExploreTechsController;

use App\Models\Service;
use App\Models\RecentWork;
use App\Models\ExploreTech;

class HomeController extends Controller
{
    public function layout()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();
        $exploreTechs = ExploreTech::all();
        return view('layout', compact('services', 'recentWorks', 'exploreTechs'));
    }

    public function dashboard()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();
        $exploreTechs = ExploreTech::all();
        return view('auth.dashboard', compact('services', 'recentWorks', 'exploreTechs'));
    }

    public function welcome()
    {
        $services = Service::all();
        $recentWorks = RecentWork::all();
        $exploreTechs = ExploreTech::all();
        return view('includes.welcome', compact('services', 'recentWorks', 'exploreTechs'));
    } 

    public function content()
    {
      return view('contents.informatics');
    }
    
    // public function content()
    // {
    //     $services = Service::all();
    //     $recentWorks = RecentWork::all();
    //     $exploreTechs = ExploreTech::all();
    //     return view('contents.informatics', compact('services', 'recentWorks', 'exploreTechs'));
    // }

}

