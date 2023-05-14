<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerProduct">
  <h2>Header Products</h2>
  <div id="">
    @foreach($headerProducts as $headerProduct)
    <form class="cmsBoxDelete" action="{{ route('headerProducts.destroy', $headerProduct->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="text" name="icon" value="{{ $headerProduct->icon }}" class="cmsInput">
      <input type="text" name="title" value="{{ $headerProduct->title }}" class="cmsInput">
      <div style="display:flex;flex-direction:column;gap:0.5vw;border:2px solid pink;">
        @if ($headerProduct->links)
        @foreach ($headerProduct->links as $link)
        <input type="text" name="linkTitle" value="{{ $link['title'] }}" class="cmsInput">
        <input type="text" name="linkText" value="{{ $link['text'] }}" class="cmsInput">
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