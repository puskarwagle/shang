<head>
  <!-- service.display.blade.php -->
  <link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<div class="dashboard">
  <h1>CONTENT MANAGEMENT SYSTEM</h1>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Overview section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('cms.overviews.index')
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
  // Get all the elements with class 'cmsDivs'
  const cmsDivs = document.querySelectorAll('.cmsDivs');

  // Loop through each 'cmsDivs' element
  cmsDivs.forEach(cmsDiv => {
    // Get the 'cmsContent', 'cmsDivsH2', and chevron icons
    const cmsContent = cmsDiv.querySelector('.cmsContent');
    const cmsDivsH2 = cmsDiv.querySelector('.cmsDivsH2');
    const chevronUp = cmsDiv.querySelector('.fa-chevron-up');
    const chevronDown = cmsDiv.querySelector('.fa-chevron-down');

    // Add a click event listener to the 'cmsDivsH2' element
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
// add links to explore and subTitles to headerProducts and headerServices 
  const linksContainers = document.querySelectorAll('.links-container');
linksContainers.forEach(linksContainer => {
  const addLinkBtn = linksContainer.querySelector('#add-link');
  const linkInputs = linksContainer.querySelector('.link-inputs');

  addLinkBtn.addEventListener('click', () => {
    const newLinkInputs = linkInputs.cloneNode(true);
    linksContainer.insertBefore(newLinkInputs, addLinkBtn);
  });
});

</script>
