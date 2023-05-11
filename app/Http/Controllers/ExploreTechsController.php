<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExploreTech;

class ExploreTechsController extends Controller
{
    public function index()
    {
      $exploreTechs = ExploreTech::all();
      return view('exploreTechs.index', compact('exploreTechs'));
    }

    public function create()
    {
      return view('exploreTechs.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'icon' => 'required|string',
        'title' => 'required|string',
        'linkTitles.*' => 'required|string', // Add validation for dynamic inputs
        'linkTexts.*' => 'required|string', // Add validation for dynamic inputs
    ]);

    $links = [];

    foreach ($validatedData['linkTitles'] as $index => $linkTitle) {
        $links[] = [
            'title' => $linkTitle,
            'text' => $validatedData['linkTexts'][$index],
        ];
    }

    ExploreTech::create([
        'icon' => $validatedData['icon'],
        'title' => $validatedData['title'],
        'links' => $links,
    ]);

    return redirect()->route('dashboard')->with('success', 'Explore Tech section created successfully!');
    }


    public function update(Request $request, string $id)
    {
      $exploreTech = ExploreTech::find($id);
      $exploreTech->icon = $request->icon;
      $exploreTech->title = $request->title;
      $exploreTech->linkTitle= $request->linkTitle;
      $exploreTech->linkText = $request->linkText;
      $exploreTech->save();
      return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
      $exploreTech = ExploreTech::find($id);
      $exploreTech->delete();
      return redirect()->route('dashboard');
    }
}
