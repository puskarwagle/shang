<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\RecentWork;
use App\Models\ExploreTech;
use App\Models\HeaderProduct;
use App\Models\HeaderService;

class HomeController extends Controller
{
    public function layout()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      return view('layout', compact('services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts'));
    }

    public function dashboard()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      return view('auth.dashboard', compact('services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts'));
    }

    public function welcome()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      return view('includes.welcome', compact('services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts'));
    } 

    public function content()
    {
      return view('contents.informatics');
    }

}

