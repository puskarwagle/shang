<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class TestLocationController extends Controller
{
  public function store(Request $request)
  {
      $ipAddress = $request->ip();

      // Get the client's location using the Stevebauman/Location package 
      // $location = Location::get($ipAddress);
      $location = Location::get('110.44.116.135'); // meroIp

      $name = $request->input('name');
      $incident = $request->input('incident');

      $locationName = $location ? $location->countryName . ', ' . $location->cityName : 'Unknown';
      $latitude = $location ? $location->latitude : null;
      $longitude = $location ? $location->longitude : null;

      return redirect()->back()->with('success', 'Incident submitted successfully.')
          ->with('ipAddress', $ipAddress)
          ->with('locationName', $locationName)
          ->with('latitude', $latitude)
          ->with('longitude', $longitude);
  }

}