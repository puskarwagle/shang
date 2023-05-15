<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerProduct">
  <h2>Header Products</h2>
  <div id="">
    @foreach($headerProducts as $headerProduct)
    <form class="cmsBoxDelete" action="{{ route('headerProducts.update', $headerProduct->id) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="icon" value="{{ $headerProduct->title }}" class="cmsInput">
      <input type="text" name="title" value="{{ $headerProduct->title_text }}" class="cmsInput">
      <div style="display:flex;flex-direction:column;gap:0.5vw;border:2px solid pink;">
        @if ($headerProduct->subTT)
        @foreach ($headerProduct->subTT as $subT)
        <input type="text" name="linkTitle" value="{{ $subT['title'] }}" class="cmsInput">
        <input type="text" name="linkText" value="{{ $subT['text'] }}" class="cmsInput">
        @endforeach
        @endif
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