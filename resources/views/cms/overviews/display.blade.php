<section id="consult">
  <h2>Overview</h2>
  <ul id="consult-list">
    @foreach($overviews as $overview)
      <li>{{ $overview->titleLi }}</li>
    @endforeach
  </ul>
  @foreach($overviews as $overview)
  <div class="inConsult">
    <img src="{{ $overview->imgsrc }}" alt="{{ $overview->imgalt }}">
    <div class="inConsultText">
      <span>{{ $overview->text1 }}</span>
      <span>{{ $overview->text2 }}</span>
      <a href="{{ $overview->link }}">{{ $overview->text3 }}</a>
    </div>
  </div>
  @endforeach
</section>