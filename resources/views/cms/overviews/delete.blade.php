<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="overviews">
  <div id="">
    @foreach($overviews as $overview)
      <div class="overview">
        <form class="cmsBoxDelete" action="{{ route('overviews.destroy', $overview->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <section id="consult">
            <h2>Overview</h2>
            <ul id="consult-list">
              <li>{{ $overview->titleLi }}</li>
            </ul>
            <div class="inConsult">
              <img src="./images/overview/{{ $overview->imgsrc }}" alt="{{ $overview->imgalt }}">
              <div class="inConsultText">
                <span>{{ $overview->text1 }}</span>
                <span>{{ $overview->text2 }}</span>
                <a href="{{ $overview->link }}">{{ $overview->text3 }}</a>
              </div>
            </div>
          </section>

          <div class="cmsActions">
            <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsDeleteButton">
              <i class="fas fa-trash-alt"></i>
            </button>
          </div>
        </form>
      </div>
    @endforeach
  </div>
</section>


