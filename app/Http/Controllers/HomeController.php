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
    $ourClients = OurClient::all();
    $data = compact('ourClients', 'services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts', 'overviews');
    return view('layout')->with($data);
  }
  
  public function dashboard()
  {
    $data = $this->getData();
    return view('auth.dashboard')->with($data);
  }
  
  public function about()
  {
    $data = $this->getData();
    return view('pages.about')->with($data);
  }
  public function dataCenterServices()
  {
    $data = $this->getData();
    return view('pages.dataCenterServices')->with($data);
  }
  public function internship()
  {
    $data = $this->getData();
    return view('pages.internship')->with($data);
  }
  public function mission()
  {
    $data = $this->getData();
    return view('pages.mission')->with($data);
  }
  public function products()
  {
    $data = $this->getData();
    return view('pages.products')->with($data);
  }

  public function content()
  {
    return view('contents.informatics');
  }
  
  private function getData()
  {
    $services = Service::all();
    $recentWorks = RecentWork::all();
    $exploreTechs = ExploreTech::all();
    $headerProducts = HeaderProduct::all();
    $headerServices = HeaderService::all();
    $overviews = Overview::all();
    $ourClients = OurClient::all();
    return compact('ourClients', 'services', 'recentWorks', 'exploreTechs', 'headerServices', 'headerProducts', 'overviews');
  }  

}

