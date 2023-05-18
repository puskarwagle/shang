<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerService">
  <div id="">
    @foreach($headerServices as $headerService)
    <form class="cmsBoxDelete" action="{{ route('headerServices.update', $headerService->id) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="title" value="{{ $headerService->title }}" class="cmsInput">
      <input type="text" name="title_text" value="{{ $headerService->title_text }}" class="cmsInput">

      <div class="mlinks-container">
        @foreach ($headerService->subTT as $index => $subT)
        <div class="mlink-inputs">
          <input type="text" name="subTitles[]" value="{{ $subT['title'] }}" class="cmsInput">
          <input type="text" name="subTexts[]" value="{{ $subT['text'] }}" class="cmsInput">
        </div>
        @endforeach
        <button class="madd-link" type="button">Add more sub titles and texts</button>
      </div>

      <div class="cmsActions">
        <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsSaveButton">
          <i class="fas fa-save"></i>
        </button>
      </div>
    </form>
    @endforeach
  </div>
</section>