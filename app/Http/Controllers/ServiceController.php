<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
      $services = Service::all();
      return view('service.index', compact('services'));
    }

    public function welcome()
    {
      $services = Service::all();
      return view('welcome', compact('services'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
      return view('service.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        Service::create($validatedData);
        return redirect()->route('service.index')->with('success', 'Service created successfully!');
    }

    // Display all the resources in service table.
    public function display()
    {
        $services = Service::all();
        return view('service.display', ['services' => $services]);
    }


    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->save();

        return redirect()->route('service.index');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('service.index');
    }

}
