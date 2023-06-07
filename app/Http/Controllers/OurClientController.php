<?php

namespace App\Http\Controllers;

use App\Models\OurClient;
use Illuminate\Http\Request;

class OurClientController extends Controller
{
  public function index()
  {
    $ourClients = OurClient::all();
    return view('ourClients.index', compact('ourClients'));
  }

  public function apiindex()
    {
      return OurClient::all();
    }

  public function create()
  {
    return view('ourClients.create');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'imgalt' => 'required|string',
        'span' => 'required|string',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('../shang_front/src/images/ourClients/'), $imageName);

    OurClient::create([
        'imgsrc' => $imageName,
        'imgalt' => $validatedData['imgalt'],
        'span' => $validatedData['span'],
    ]);

    return redirect()->back()->with('success', 'Our client section created successfully!'); 
  }


    public function update(Request $request, $id)
    {
        $ourClient = OurClient::findOrFail($id);

        //dd($request->all());

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('../shang_front/src/images/ourClients/') . $ourClient->imgsrc;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            if ($request->file('image')->isValid()) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images/ourClients/'), $imageName);
                $ourClient->imgsrc = $imageName;
            } else {
                return redirect()->back()->withErrors(['image' => 'The image upload failed.']);
            }
        }

        $ourClient->imgalt = $request->input('imgalt');
        $ourClient->span = $request->input('span');
        $ourClient->save();
        return redirect()->route('dashboard')->with('success', 'ourClients section updated successfully!');
    }



  public function destroy(string $id)
  {
    $ourClients = OurClient::find($id);
    $ourClients->delete();
    return redirect()->route('dashboard');
  }
}
