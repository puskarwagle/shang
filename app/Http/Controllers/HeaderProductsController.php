<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HeaderProduct;

class HeaderProductsController extends Controller
{
    public function index()
    {
      $headerProducts = HeaderProduct::all();
      return view('headerProducts.index', compact('headerProducts'));
    }

    public function apiindex()
    {
      return HeaderProduct::all();
    }

    public function create()
    {
      return view('headerProducts.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'title' => 'required|string',
        'title_text' => 'required|string',
        'subTitles.*' => 'required|string',
        'subTexts.*' => 'required|string',
    ]);

    $subTT = [];

    foreach ($validatedData['subTitles'] as $index => $subTitle) {
        $subTT[] = [
            'title' => $subTitle,
            'text' => $validatedData['subTexts'][$index],
        ];
    }

    HeaderProduct::create([
        'title' => $validatedData['title'],
        'title_text' => $validatedData['title_text'],
        'subTT' => $subTT,
    ]);

    return redirect()->route('dashboard')->with('success', 'HeaderMain Products section created successfully!');
    }


    public function update(Request $request, string $id)
    {
      $headerProduct = HeaderProduct::find($id);
      $headerProduct->title = $request->title;
      if (!empty($request->title_text)) {
        $headerProduct->title_text = $request->title_text;
      }
      $subTT = [];
      for ($i = 0; $i < count($request->subTitles); $i++) {
        $subTT[] = ['title' => $request->subTitles[$i], 'text' => $request->subTexts[$i]];
      }
      $headerProduct->subTT = $subTT;
      $headerProduct->save();
      return redirect()->route('dashboard')->with('success', 'HeaderMain Products section updated successfully!');
    }

    public function destroy(string $id)
    {
      $headerProduct = HeaderProduct::find($id);
      $headerProduct->delete();
      return redirect()->route('dashboard');
    }
}