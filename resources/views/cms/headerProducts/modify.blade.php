<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerProduct">
  <div id="">
    @foreach($headerProducts as $headerProduct)
    <form class="cmsBoxDelete" action="{{ route('headerProducts.update', $headerProduct->id) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="title" value="{{ $headerProduct->title }}" class="cmsInput">
      <input type="text" name="title_text" value="{{ $headerProduct->title_text }}" class="cmsInput">

      <div class="mlinks-container">
        @foreach ($headerProduct->subTT as $index => $subT)
        <div class="mlink-inputs">
          <label for="subTitles">Sub Title:</label>
          <input type="text" name="subTitles[]" value="{{ $subT['title'] }}">
          <label for="subTexts">sub Texts:</label>
          <input type="text" name="subTexts[]" value="{{ $subT['text'] }}">
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