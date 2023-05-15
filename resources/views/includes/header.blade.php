<header>
  <a href="\">
    <img src="./images/newSH.png" alt="shangrila logo">
  </a>
  <ul class="navLarge">
    <li><a class="active" href="{{ route('about') }}">About</a></li>
    <li>
      <p class="headerNavProd">Products <i class="fas fa-chevron-down fa-xs"></i></p>
    </li>
    <li>
      <p>Services <i class="fas fa-chevron-down fa-xs"></i></p>
    </li>
    <li><a href="#recentWorks">Projects</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>

  <ul class="navSmall">
    <div id="navHam">
      <svg id="ham" viewBox="0 0 100 100" width="2vw">
        <rect x="10" y="25" width="80" height="10" />
        <rect x="10" y="45" width="80" height="10" />
        <rect x="10" y="65" width="80" height="10" />
        <rect x="10" y="85" width="80" height="10" />
      </svg>
      <svg id="hamClose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2vw">
        <line x1="18" y1="6" x2="6" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        <line x1="6" y1="6" x2="18" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
      </svg>
    </div>
    <div id="navLists">
      <li><a class="active" href="{{ route('about') }}"><span>About</span></a></li>
      <li><a href=""><span>Products</span><i class="fas fa-angle-right"></i></a></li>
      <li><a href=""><span>Services</span><i class="fas fa-angle-right"></i></a></li>
      <li><a href="#recentWorks"><span>Projects</span></a></li>
      <li><a href="#contact"><span>Contact</span></a></li>
    </div>
  </ul>

  <div class="headerMain headerProd">
    <ul class="hMA">
      @foreach($headerProducts as $headerProduct)
      <li class="">{{ $headerProduct->title }}</li>
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
  </div> <!-- .headerMain headerProd -->
</header>

<script>
  // headerProd Click on nav a to flex the .headerProd Large
  const headerho = document.querySelector('header');
  const navL = document.querySelectorAll('.navLarge li .headerNavProd');
  const headerProd = document.querySelector('.headerProd');
  navL.forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
      headerProd.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
      headerProd.style.display = (headerProd.style.display === 'flex') ? 'none' : 'flex';
    });
  });
  window.addEventListener('click', (event) => {
    if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest('.headerProd')) {
      headerProd.style.display = 'none';
    }
  });
  // Click on nav a to flex the .headerProd Large
</script>

<script>
  const liElements = document.querySelectorAll('.hMA li');
  const hmbElements = document.querySelectorAll('.hMB');

  // Set the first li and hmb elements as active when the page is loaded
  liElements[0].classList.add('hmaactive');
  hmbElements[0].classList.add('hmbActive');

  liElements.forEach((li, index) => {
    li.addEventListener('click', () => {
      const activeLi = document.querySelector('.hMA li.hmaactive');
      const activeHmb = document.querySelector('.hMB.hmbActive');
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
</script>
