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
  public function apiindex()
    {
      return Overview::all();
    }

  public function create()
  {
    return view('overviews.create');
  }

  public function store(Request $request)
  {

    $validatedData = $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'imgalt' => 'required|string',
      'titleLi' => 'required|string',
      'text1' => 'required|string',
      'text2' => 'required|string',
      'text3' => 'required|string',
      'link' => 'required|string',
    ]);
    
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images/overview/'), $imageName);
    
    $validatedData['imgsrc'] = $imageName;
    //dd($validatedData);

    Overview::create($validatedData);
    return redirect()->route('dashboard')->with('success', 'Overviews section created successfully!');    
  }

  public function update(Request $request, $id)
  {
    $overview = Overview::findOrFail($id);

    if ($request->hasFile('image')) {
        $oldImagePath = public_path('images/overview/') . $overview->imgsrc;
        if (file_exists($oldImagePath)) {
          unlink($oldImagePath);
        }

        if ($request->file('image')->isValid()) {
          $imageName = time().'.'.$request->file('image')->extension();
          $request->file('image')->move(public_path('images/overview/'), $imageName);
          $overview->imgsrc = $imageName;
        } else {
          return redirect()->back()->withErrors(['image' => 'The image upload failed.']);
        }
    }

    $overview->imgalt = $request->input('imgalt');
    $overview->titleLi = $request->input('titleLi');
    $overview->text1 = $request->input('text1');
    $overview->text2 = $request->input('text2');
    $overview->text3 = $request->input('text3');
    $overview->link = $request->input('link');

    $overview->save();

    return redirect()->route('dashboard')->with('success', 'Overviews section updated successfully!');
  }


  public function destroy(string $id)
  {
    $overviews = Overview::find($id);
    $overviews->delete();
    return redirect()->route('dashboard');
  }
}
