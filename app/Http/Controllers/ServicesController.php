<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
      $services = Service::all();
      return view('cms.service.index', compact('services'));
    }

    public function apiindex()
    {
      return Service::all();
    }

    public function welcome()
    {
      $services = Service::all();
      return view('welcome', compact('services'));
    }

    public function create()
    {
      return view('service.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        Service::create($validatedData);
        return redirect()->route('dashboard')->with('success', 'Service created successfully!');
    }

   

    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        // dd($request->all());
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->save();
        return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('dashboard');
    }

}


/*  public function display()
    {
        $services = Service::all();
        return view('service.display', ['services' => $services]);
    } */