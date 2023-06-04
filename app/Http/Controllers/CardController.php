<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $cards = Card::all();
      return view('cms.cards.display', compact('cards'));
    }

    public function apiindex()
    {
      return Card::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('cms.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'routes' => 'required|string',
      ]);
      Card::create($validatedData);
      return redirect()->route('dashboard')->with('success', 'Cards created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $card = Card::find($id);
        // dd($request->all());
        $card->title = $request->title;
        $card->description = $request->description;
        $card->routes = $request->routes;
        $card->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $card = Card::find($id);
      $card->delete();
      return redirect()->route('dashboard');
    }
}
