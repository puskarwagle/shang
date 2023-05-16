<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="exploreTech">
  <h2>Explore Tech</h2>
  <div id="">
    @foreach($exploreTechs as $exploreTech)
    <form class="cmsBoxDelete" action="{{ route('exploreTechs.update', $exploreTech->id) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="icon" value="{{ $exploreTech->icon }}" class="cmsInput">
      <input type="text" name="title" value="{{ $exploreTech->title }}" class="cmsInput">
      <div style="display:flex;flex-direction:column;gap:0.5vw;border:2px solid pink;">
        @if ($exploreTech->links)
        @foreach ($exploreTech->links as $link)
        <input type="text" name="linkTitle[]" value="{{ $link['title'] }}" class="cmsInput">
        <input type="text" name="linkText[]" value="{{ $link['text'] }}" class="cmsInput">
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