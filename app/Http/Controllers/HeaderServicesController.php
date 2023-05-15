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
      $headerService->title_text = $request->title_text;
      $headerService->subTitle= $request->subTitle;
      $headerService->subText = $request->subText;
      $headerService->save();
      return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
      $headerService = HeaderService::find($id);
      $headerService->delete();
      return redirect()->route('dashboard');
    }
}
