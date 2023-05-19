<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerService">
  <h2>Header Services</h2>
  <div id="">
    @foreach($headerServices as $headerService)
    <form class="cmsBoxDelete" action="{{ route('headerServices.update', $headerService->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="text" name="icon" value="{{ $headerService->title }}" class="cmsInput">
      <input type="text" name="title" value="{{ $headerService->title_text }}" class="cmsInput">
      <div style="display:flex;flex-direction:column;gap:0.5vw;border:2px solid pink;">
        @if ($headerService->subTT)
        @foreach ($headerService->subTT as $subT)
        <input type="text" name="linkTitle" value="{{ $subT['title'] }}" class="cmsInput">
        <input type="text" name="linkText" value="{{ $subT['text'] }}" class="cmsInput">
        @endforeach
        @endif
      </div>
      <div class="cmsActions">
        <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsDeleteButton">
          <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    </form>
    @endforeach
  </div>
</section>