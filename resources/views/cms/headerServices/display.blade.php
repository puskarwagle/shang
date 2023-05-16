<header>
  <div class="headerMain headerServ" style="display:flex;">
    <ul class="hMA">
    @foreach($headerServices as $headerService)
      <li>{{ $headerService->title }}</li>
    @endforeach
    </ul> <!-- .hMA -->
    <div class="hMB">
      <div class="hMBFirst">
      @foreach($headerServices as $headerService)
        <span>{{ $headerService->title }} <i class="fas fa-arrow-right"></i></span>
        <span>{{ $headerService->title_text }}</span>
      @endforeach
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
  </div> <!-- .headerMain -->
</header>