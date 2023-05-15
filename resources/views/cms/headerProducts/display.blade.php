<header>
  <div class="headerMain">
    <ul class="hMA">
    @foreach($headerProducts as $headerProduct)
      <li>{{ $headerProduct->title }}</li>
    @endforeach
    </ul> <!-- .hMA -->
    <div class="hMB">
      <div class="hMBFirst">
      @foreach($headerProducts as $headerProduct)
        <span>{{ $headerProduct->title }} <i class="fas fa-arrow-right"></i></span>
        <span>{{ $headerProduct->title_text }}</span>
      @endforeach
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
  </div> <!-- .headerMain -->
</header>