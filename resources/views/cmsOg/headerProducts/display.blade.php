<header>
  <div class="headerMain headerProd" style="display:flex;">
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
  const liElements = document.querySelectorAll('.hMA li');
  const hmbElements = document.querySelectorAll('.hMB');
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
