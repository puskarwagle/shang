<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
      $overviews = Overview::all();
      return view('overviews.index', compact('overviews'));
    }

    public function create()
    {
      return view('overviews.create');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'imgsrc' => 'required|string',
        'imgalt' => 'required|string',
        'titleLi' => 'required|string',
        'text1' => 'required|string',
        'text2' => 'required|string',
        'text3' => 'required|string',
        'link' => 'required|string',
      ]);
      Overview::create($validatedData);
      return redirect()->route('dashboard')->with('success', 'Overviews section created successfully!');
    }

    public function update(Request $request, string $id)
    {
      $overviews = Overview::find($id);
      $overviews->imgsrc = $request->imgsrc;
      $overviews->imgalt = $request->imgalt;
      $overviews->titleLi = $request->titleLi;
      $overviews->text1 = $request->text1;
      $overviews->text2 = $request->text2;
      $overviews->text3 = $request->text3;
      $overviews->link = $request->link;
      $overviews->save();
      return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
      $overviews = Overview::find($id);
      $overviews->delete();
      return redirect()->route('dashboard');
    }
}
