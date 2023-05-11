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
      <span>Create exploreTech.</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('exploreTechs.create')
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Display exploreTech</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('exploreTechs.display') 
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Modify exploreTech</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('exploreTechs.modify')
    </div>
  </div>

  <div class="cmsDivs">
    <h2 class="cmsDivsH2">
      <span>Delete exploreTech</span>
      <i class="fas fa-chevron-down fa-xs"></i>
      <i class="fas fa-chevron-up fa-xs"></i>
    </h2>
    <div class="cmsContent">
      @include('exploreTechs.delete')
    </div>
  </div>
  <em id="pus">puskarwagle</em>
</div>

