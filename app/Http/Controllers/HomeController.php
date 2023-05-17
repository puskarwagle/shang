<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\RecentWork;
use App\Models\ExploreTech;
use App\Models\HeaderProduct;
use App\Models\HeaderService;
use App\Models\Overview;
use App\Models\OurClient;

class HomeController extends Controller
{
    public function layout()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      $overviews = Overview::all();
      $ourclients = OurClient::all();
      return view('layout', compact('ourclients', 'services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts', 'overviews'));
    }

    public function dashboard()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      $overviews = Overview::all();
      $ourclients = OurClient::all();
      return view('auth.dashboard', compact('ourclients', 'services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts', 'overviews'));
    }

    public function welcome()
    {
      $services = Service::all();
      $recentWorks = RecentWork::all();
      $exploreTechs = ExploreTech::all();
      $headerProducts = HeaderProduct::all();
      $headerServices = HeaderService::all();
      $overviews = Overview::all();
      $ourclients = OurClient::all();
      return view('includes.welcome', compact('ourclients', 'services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts', 'overviews'));
    } 

    public function content()
    {
      return view('contents.informatics');
    }

}

