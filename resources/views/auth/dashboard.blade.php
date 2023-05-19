<head>
  <!-- service.display.blade.php -->
  <link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<div class="dashboard">
  <h1>CONTENT MANAGEMENT SYSTEM</h1><br>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Overview section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.overviews.index')
  </div>
  
  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Our clients section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.ourClients.index')
  </div>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Header Products section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.headerProducts.index')
  </div>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Header Service section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.headerServices.index')
  </div>
  
  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Our Services section cms.</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.service.index')
  </div>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Recent Works section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.recentWorks.index')
  </div>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Explore our technology section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.exploreTechs.index')
  </div>

</div> <!-- class="dashboard" -->

<script>
  const cmsDivs = document.querySelectorAll('.cmsDivs');

  cmsDivs.forEach(cmsDiv => {
    const cmsContent = cmsDiv.querySelector('.cmsContent');
    const cmsDivsH2 = cmsDiv.querySelector('.cmsDivsH2');
    const chevronUp = cmsDiv.querySelector('.fa-chevron-up');
    const chevronDown = cmsDiv.querySelector('.fa-chevron-down');

    cmsDivsH2.addEventListener('click', () => {
      // Toggle the 'cmsContent' element's display property
      if (cmsContent.style.display === 'none') {
        cmsContent.style.display = 'block';
        chevronUp.style.display = 'inline-block';
        chevronDown.style.display = 'none';
      } else {
        cmsContent.style.display = 'none';
        chevronUp.style.display = 'none';
        chevronDown.style.display = 'inline-block';
      }
    });
  });
</script>

<script>
  //IBM cards tHead click tContent display none or flex
  const tCards = document.querySelectorAll('.tCards');
  const i2 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(2)');
  const i3 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(3)');
  const iSpan = document.querySelector('#exploreTech .tCards .tHead .tTexts span');

  tCards.forEach((tCard) => {
    const tHead = tCard.querySelector('.tHead');
    const tContent = tCard.querySelector('.tContent');

    tHead.addEventListener('click', () => {
      if (tCard.classList.contains('focus-within')) {
        tContent.style.display = 'none';
        tCard.classList.remove('focus-within');
      } else {
        tContent.style.display = 'flex';
        tCard.classList.add('focus-within');
      }
    });
  });
</script>

<script>
// Create form add more links header
  const clinksContainers = document.querySelectorAll('.clinks-container');
  clinksContainers.forEach(clinksContainer => {
    const caddLinkBtn = clinksContainer.querySelector('.cadd-link');
    const clinkInputs = clinksContainer.querySelectorAll('.clink-inputs');

    caddLinkBtn.addEventListener('click', () => {
      const cnewLinkInputs = clinkInputs[0].cloneNode(true);
      clinksContainer.insertBefore(cnewLinkInputs, caddLinkBtn);
    });
  });
</script>

<script>
// Modify form add more links 
  const mlinksContainers = document.querySelectorAll('.mlinks-container');
  mlinksContainers.forEach(mlinksContainer => {
    const maddLinkBtn = mlinksContainer.querySelector('.madd-link');
    const mlinkInputs = mlinksContainer.querySelectorAll('.mlink-inputs');

    maddLinkBtn.addEventListener('click', () => {
      const mnewLinkInputs = mlinkInputs[0].cloneNode(true);
      mlinksContainer.insertBefore(mnewLinkInputs, maddLinkBtn);
    });
  });
</script>

