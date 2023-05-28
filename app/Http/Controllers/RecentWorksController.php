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

    public function create()
    {
        return view('recentWorks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
            'imgalt' => 'required|string',
            'titleA' => 'required|string',
            'titleB' => 'required|string',
            'description' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('public/images/recentWorks');

        $validatedData['imgsrc'] = Storage::url($imagePath);

        RecentWork::create($validatedData);
        return redirect()->route('dashboard')->with('success', 'Recent works section created successfully!');
    }




    public function update(Request $request, string $id)
    {
        $recentWork = RecentWork::findOrFail($id);

        //dd($request->all());

        $validatedData = $request->validate([
            'image' => 'nullable|image|max:2048',
            'imgalt' => 'required|string',
            'titleA' => 'required|string',
            'titleB' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/recentWorks');
            $validatedData['imgsrc'] = Storage::url($imagePath);
            Storage::delete($recentWork->imgsrc);
        }

        $recentWork->update($validatedData);

        return redirect()->route('dashboard');
    }






    public function destroy(string $id)
    {
        $recentWork = RecentWork::findOrFail($id);
        Storage::delete($recentWork->imgsrc);
        $recentWork->delete();
        return redirect()->route('dashboard');
    }
}
