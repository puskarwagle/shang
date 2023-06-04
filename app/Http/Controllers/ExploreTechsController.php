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

    public function apiindex()
    {
      return ExploreTech::all();
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
        'linkTitle.*' => 'required|string',
        'linkText.*' => 'required|string',
    ]);

    $links = [];
    foreach ($validatedData['linkTitle'] as $index => $linkTitle) {
        $links[] = [
            'title' => $linkTitle,
            'text' => $validatedData['linkText'][$index],
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
      //dd($request->all());

      $exploreTech = ExploreTech::find($id);
      $exploreTech->icon = $request->icon;
      $exploreTech->title = $request->title;
      
      $links = array();
      if ($request->has('linkTitle') && $request->has('linkText')) {
        for ($i = 0; $i < count($request->linkTitle); $i++) {
          $title = $request->linkTitle[$i];
          $text = $request->linkText[$i];
          if (!empty($title) && !empty($text)) {
            $links[] = array('title' => $title, 'text' => $text);
          }
        }
      }
      $exploreTech->links = $links;
      
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
