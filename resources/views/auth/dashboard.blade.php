<head>
  <!-- service.display.blade.php -->
  <link rel="stylesheet" href="{{ asset('css/ibmMain.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<div class="dashboard">
  <h1 style="white-space:nowrap;text-align:center;">CONTENT MANAGEMENT SYSTEM</h1><br>
  
  <div>@include('cms.exploreTechs.modify')</div>
  <div>@include('cms.overviews.display')</div>
  <div>@include('cms.recentWorks.modify')</div>
  <div>@include('cms.ourClients.modify')</div>
  <div>@include('cms.headerServices.display')</div>
  <div>@include('cms.headerProducts.display')</div>

  
</div>
    

    <div style="display:none;">
      <!--  -->
    </div>