<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecentWork;

class RecentWorksController extends Controller
{
    public function index()
    {
      $recentWorks = RecentWork::all();
      return view('recentWorks.index', compact('recentWorks'));
    }

    public function create()
    {
      return view('recentWorks.create');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'imgsrc' => 'required|string',
        'imgalt' => 'required|string',
        'titleA' => 'required|string',
        'titleB' => 'required|string',
        'description' => 'required|string',
      ]);
      RecentWork::create($validatedData);
      return redirect()->route('dashboard')->with('success', 'Recent works section created successfully!');
    }

    public function update(Request $request, string $id)
    {
      $recentWorks = RecentWork::find($id);
      $recentWorks->imgsrc = $request->imgsrc;
      $recentWorks->imgalt = $request->imgalt;
      $recentWorks->titleA = $request->titleA;
      $recentWorks->titleB = $request->titleB;
      $recentWorks->description = $request->description;
      $recentWorks->save();
      return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
      $recentWorks = RecentWork::find($id);
      $recentWorks->delete();
      return redirect()->route('dashboard');
    }
}
