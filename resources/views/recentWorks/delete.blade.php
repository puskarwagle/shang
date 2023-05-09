<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="recentWorks">
  <h2>Recent Works</h2>
  <div id="honey">
    @foreach($recentWorks as $recentWork)
        <form class="cmsBoxDelete" action="{{ route('recentWorks.update', $recentWork->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="text" name="imgsrc" value="{{ $recentWork->imgsrc }}" class="cmsInput">
          <input type="text" name="imgalt" value="{{ $recentWork->imgalt }}" class="cmsInput">
          <input type="text" name="titleA" value="{{ $recentWork->titleA }}" class="cmsInput">
          <input type="text" name="titleB" value="{{ $recentWork->titleB }}" class="cmsInput">
          <input type="text" name="description" value="{{ $recentWork->description }}" class="cmsInput">

          <div class="cmsActions">
            <button type="submit" class="cmsButton cmsDeleteButton">
              <i class="fas fa-trash-alt"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>