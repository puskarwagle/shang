<header class="d-flex py-2 px-4 border-bottom align-items-center">
  <a class="pe-4" href="\">
    <img class="logo" style="max-width: 4rem;aspect-ratio: 1/0.5;" src="./images/newSH.png" alt="shangrila logo">
  </a>
  
  <!-- nav large -->
  <ul class="navLarge list-unstyled d-flex gap-5 my-auto mx-2 ps-4 border-start border-muted" style="font-size: 1rem;">
    <li class="my-auto"><a class="text-decoration-none text-muted" href="{{ route('about') }}">About</a></li>
    <li class="my-auto">
      <p class="headerNavProd my-auto text-muted d-flex align-items-center gap-2">Products <i class="fas fa-chevron-down fa-xs"></i></p>
    </li>
    <li class="my-auto">
      <p class="headerNavServ my-auto text-muted d-flex align-items-center gap-2">Services <i class="fas fa-chevron-down fa-xs"></i></p>
    </li>
    <li class="my-auto"><a class="text-decoration-none text-muted" href="#recentWorks">Projects</a></li>
    <li class="my-auto"><a class="text-decoration-none text-muted" href="#contact">Contact</a></li>
  </ul>

  <!-- nav small -->
  <ul class="navSmall">
    <div id="navHam">
      <i id="ham" class="fas fa-bars"></i>
      <i id="hamClose" class="fas fa-times"></i>
    </div>
    <div id="navLists">
      <li><a class="active" href="{{ route('about') }}"><span>About</span></a></li>
      <li><a href=""><span>Products</span><i class="fas fa-angle-right"></i></a></li>
      <li><a href=""><span>Services</span><i class="fas fa-angle-right"></i></a></li>
      <li><a href="#recentWorks"><span>Projects</span></a></li>
      <li><a href="#contact"><span>Contact</span></a></li>
    </div>
  </ul>

  <!-- .headerMain headerProd -->
  <div class="headerMain headerProd" style="font-size: 1rem;">
    <ul class="hMA list-unstyled pt-4 pb-4 ps-4">
      @foreach($headerProducts as $headerProduct)
      <li class="text-nowrap p-1">{{ $headerProduct->title }}</li>
      @endforeach
    </ul> <!-- .hMA -->
    @foreach($headerProducts as $headerProduct)
    <div class="hMB hmbPassive">
      <div class="hMBFirst">
        <span>{{ $headerProduct->title }} <i class="fas fa-arrow-right"></i></span>
        <span>{{ $headerProduct->title_text }}</span>
      </div>
      <div class="hMBTexts">
        @if ($headerProduct->subTT)
        @foreach ($headerProduct->subTT as $subT)
        <div class="hMBText">
          <span>{{ $subT['title'] }}</span>
          <span>{{ $subT['text'] }}</span>
        </div>
        @endforeach
        @endif
      </div> <!-- .hMBTexts -->
    </div> <!-- .hMB -->
    @endforeach
  </div> 

  <!-- .headerMain headerServ -->
  <div class="headerMain headerServ" style="font-size: 1rem;">
    <ul class="hMA  list-unstyled pt-4 pb-4 ps-4">
      @foreach($headerServices as $headerService)
      <li class="text-nowrap p-1">{{ $headerService->title }}</li>
      @endforeach
    </ul> <!-- .hMA -->
    @foreach($headerServices as $headerService)
    <div class="hMB hmbPassive">
      <div class="hMBFirst">
        <span>{{ $headerService->title }} <i class="fas fa-arrow-right"></i></span>
        <span>{{ $headerService->title_text }}</span>
      </div>
      <div class="hMBTexts">
        @if ($headerService->subTT)
        @foreach ($headerService->subTT as $subT)
        <div class="hMBText">
          <span>{{ $subT['title'] }}</span>
          <span>{{ $subT['text'] }}</span>
        </div>
        @endforeach
        @endif
      </div> <!-- .hMBTexts -->
    </div> <!-- .hMB -->
    @endforeach
  </div> 
</header>

<!-- Switch css to no css -->
<script>
const checkbox = document.getElementById('checkbox');

checkbox.addEventListener('change', (event) => {
  const link = document.getElementById('css-link');
  if (event.target.checked) {
    link.href = '/css/no.css';
  } else {
    link.href = '/css/ibm.css';
  }
});
</script>

<!-- Header Products -->
<script>
const headerho = document.querySelector('header');
const navLP = document.querySelectorAll('.navLarge li .headerNavProd');
const headerProd = document.querySelector('.headerProd');
navLP.forEach(linkP => {
  linkP.addEventListener('click', (event) => {
    event.preventDefault();
    headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerProd.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerProd.style.display = (headerProd.style.display === 'flex') ? 'none' : 'flex';
  });
});
window.addEventListener('click', (event) => {
  if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest(
      '.headerProd')) {
    headerProd.style.display = 'none';
  }
});
</script>

<!-- Header Services -->
<script>
const navLS = document.querySelectorAll('.navLarge li .headerNavServ');
const headerServ = document.querySelector('.headerServ');
navLS.forEach(linkS => {
  linkS.addEventListener('click', (event) => {
    event.preventDefault();
    headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerServ.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerServ.style.display = (headerServ.style.display === 'flex') ? 'none' : 'flex';
  });
});
window.addEventListener('click', (event) => {
  if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest(
      '.headerServ')) {
    headerServ.style.display = 'none';
  }
});
</script>

<!-- beautifing headerMain click hma li to show hmb -->
<script>
const headerProds = document.querySelectorAll('.headerProd');
const headerServs = document.querySelectorAll('.headerServ');

headerProds.forEach(headerProd => {
  const liElements = headerProd.querySelectorAll('.hMA li');
  const hmbElements = headerProd.querySelectorAll('.hMB');
  liElements[0].classList.add('hmaactive');
  hmbElements[0].classList.add('hmbActive');
  liElements.forEach((li, index) => {
    li.addEventListener('click', () => {
      const activeLi = headerProd.querySelector('.hMA li.hmaactive');
      const activeHmb = headerProd.querySelector('.hMB.hmbActive');
      if (activeLi && activeHmb) {
        activeLi.classList.remove('hmaactive');
        activeHmb.classList.remove('hmbActive');
        activeHmb.classList.add('hmbPassive');
      }
      li.classList.add('hmaactive');
      hmbElements[index].classList.add('hmbActive');
      hmbElements[index].classList.remove('hmbPassive');
    });
  });
});

headerServs.forEach(headerServ => {
  const liElements = headerServ.querySelectorAll('.hMA li');
  const hmbElements = headerServ.querySelectorAll('.hMB');
  liElements[0].classList.add('hmaactive');
  hmbElements[0].classList.add('hmbActive');
  liElements.forEach((li, index) => {
    li.addEventListener('click', () => {
      const activeLi = headerServ.querySelector('.hMA li.hmaactive');
      const activeHmb = headerServ.querySelector('.hMB.hmbActive');
      if (activeLi && activeHmb) {
        activeLi.classList.remove('hmaactive');
        activeHmb.classList.remove('hmbActive');
        activeHmb.classList.add('hmbPassive');
      }
      li.classList.add('hmaactive');
      hmbElements[index].classList.add('hmbActive');
      hmbElements[index].classList.remove('hmbPassive');
    });
  });
});
</script>

<script>
// Click on nav a to flex the .headerMain Small
const headerMain = document.querySelector('.headerMain');
const navS = document.querySelectorAll('#navLists li a:has(i)');
navS.forEach(linkSs => {
  linkSs.addEventListener('click', (event) => {
    if (headerho) {
      event.preventDefault();
      headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
      headerMain.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
      headerMain.style.display = (headerMain.style.display === 'flex') ? 'none' : 'flex';
    };
  });
});
window.addEventListener('click', (event) => {
  if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest(
      '.headerMain')) {
    headerMain.style.display = 'none';
  }
});
// Click on nav a to flex the .headerMain Small
</script>