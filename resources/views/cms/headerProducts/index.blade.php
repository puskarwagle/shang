<head>
  <!-- service.display.blade.php -->
  <link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<div class="cms">
  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Create Header Products</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('cms.headerProducts.create')
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Display Header Products</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('cms.headerProducts.display') 
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Modify Header Products</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('cms.headerProducts.modify')
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Delete Header Products</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('cms.headerProducts.delete')
    </div>
  </div>
</div>

