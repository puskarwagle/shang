<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurClient;

class OurClientController extends Controller
{
    public function index()
    {
        $ourClients = OurClient::all();
        return view('cms.ourClients.index', compact('ourClients'));
    }

    public function create()
    {
        return view('cms.ourClients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'imgsrc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imgalt' => 'required',
            'span' => 'required'
        ]);

        $imageName = time().'.'.$request->imgsrc->extension();
        $request->imgsrc->move(public_path('images/ourClients'), $imageName);

        OurClient::create([
            'imgsrc' => $imageName,
            'imgalt' => $validatedData['imgalt'],
            'span' => $validatedData['span']
        ]);

        return redirect()->route('cms.ourClients.index')->with('success','Our client added successfully.');
    }

    public function update(Request $request, $id)
    {
        $ourClient = OurClient::findOrFail($id);
        $validatedData = $request->validate([
            'imgsrc' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imgalt' => 'required',
            'span' => 'required'
        ]);

        if ($request->hasFile('imgsrc')) {
            $oldImagePath = public_path('images/ourClients/') . $ourClient->imgsrc;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $imageName = time().'.'.$request->imgsrc->extension();
            $request->imgsrc->move(public_path('images/ourClients'), $imageName);
            $ourClient->imgsrc = $imageName;
        }

        $ourClient->imgalt = $validatedData['imgalt'];
        $ourClient->span = $validatedData['span'];
        $ourClient->save();

        return redirect()->route('cms.ourClients.index')->with('success','Our client updated successfully.');
    }

    public function destroy($id)
    {
        $ourClient = OurClient::findOrFail($id);
        $imagePath = public_path('images/ourClients/') . $ourClient->imgsrc;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $ourClient->delete();
        return redirect()->route('cms.ourClients.index')->with('success','Our client deleted successfully.');
    }
}
