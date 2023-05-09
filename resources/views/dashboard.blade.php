<div class="dashboard">
  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>Services section cms.</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('service.index')
  </div>

  <div class="dashboardDivs">
    <h2 class="dashboardDivsH2">
      <span>RecentWorks section cms</span>
      <i class="fas fa-chevron-down fa-xs"></i>
    </h2>
      @include('recentWorks.index')
  </div>
</div>

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