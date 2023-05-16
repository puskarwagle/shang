<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<section id="overviews">
  <h2>Overviews</h2>
  <div id="">
    @foreach($overviews as $overview)
        <form class="cmsBoxDelete" action="{{ route('overviews.update', $overview->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="text" name="imgsrc" value="{{ $overview->imgsrc }}" class="cmsInput">
          <input type="text" name="imgalt" value="{{ $overview->imgalt }}" class="cmsInput">
          <input type="text" name="titleA" value="{{ $overview->title }}" class="cmsInput">
          <input type="text" name="titleB" value="{{ $overview->text1 }}" class="cmsInput">
          <input type="text" name="titleB" value="{{ $overview->text2 }}" class="cmsInput">
          <input type="text" name="titleB" value="{{ $overview->text3 }}" class="cmsInput">
          <input type="text" name="titleB" value="{{ $overview->link }}" class="cmsInput">

          <div class="cmsActions">
            <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsSaveButton">
              <i class="fas fa-save"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>
