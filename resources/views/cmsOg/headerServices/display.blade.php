<header>
  <div class="headerMain headerServ" style="display:flex;">
    <ul class="hMA">
      @foreach($headerServices as $headerService)
      <li class="">{{ $headerService->title }}</li>
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
  </div> <!-- .headerMain headerServ -->
</header>

<!-- beautifing headerMain click hma li to show hmb -->
<script>
const headerServs = document.querySelectorAll('.headerServ');

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