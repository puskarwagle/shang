<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HeaderService;

class HeaderServicesController extends Controller
{
    public function index()
    {
      $headerServices = HeaderService::all();
      return view('headerServices.index', compact('headerServices'));
    }

    public function apiindex()
    {
      return HeaderService::all();
    }

    public function create()
    {
      return view('headerServices.create');
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

    HeaderService::create([
        'title' => $validatedData['title'],
        'title_text' => $validatedData['title_text'],
        'subTT' => $subTT,
    ]);

    return redirect()->route('dashboard')->with('success', 'HeaderMain Service section created successfully!');
    }


    public function update(Request $request, string $id)
    {
      $headerService = HeaderService::find($id);
      $headerService->title = $request->title;
      if (!empty($request->title_text)) {
        $headerService->title_text = $request->title_text;
      }
      $subTT = [];
      for ($i = 0; $i < count($request->subTitles); $i++) {
        $subTT[] = ['title' => $request->subTitles[$i], 'text' => $request->subTexts[$i]];
      }
      $headerService->subTT = $subTT;
      $headerService->save();
      return redirect()->route('dashboard')->with('success', 'HeaderMain Products section updated successfully!');
    }

    public function destroy(string $id)
    {
      $headerService = HeaderService::find($id);
      $headerService->delete();
      return redirect()->route('dashboard');
    }
}
