<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecentWork;
use Illuminate\Support\Facades\Storage;

class RecentWorksController extends Controller
{
    public function index()
    {
        $recentWorks = RecentWork::all();
        return view('recentWorks.index', compact('recentWorks'));
    }

    public function apiindex()
    {
      return RecentWork::all();
    }

    public function create()
    {
        return view('recentWorks.create');
    }

    public function store(Request $request)
    {
       //dd($request->all());

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

    public function update(Request $request, $id)
    {
        $recentWork = RecentWork::findOrFail($id);

        //dd($request->all());

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('images/recentWorks/') . $recentWork->imgsrc;

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $image = $request->file('image');

            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/recentWorks/'), $imageName);
                $recentWork->imgsrc = $imageName;
            } else {
                return redirect()->back()->withErrors(['image' => 'The image upload failed.']);
            }
        }

        $recentWork->imgalt = $request->input('imgalt');
        $recentWork->titleA = $request->input('titleA');
        $recentWork->titleB = $request->input('titleB');
        $recentWork->description = $request->input('description');
        $recentWork->save();

        return redirect()->route('dashboard')->with('success', 'Recent works section updated successfully!');
    }









    public function destroy(string $id)
    {
      $recentWorks = RecentWork::find($id);
      $recentWorks->delete();
      return redirect()->route('dashboard');
    }
}
