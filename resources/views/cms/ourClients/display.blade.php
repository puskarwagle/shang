<section id="happyClients">
  <div id="allClientCards">
  @foreach($ourclients as $ourclient)
    <div class="clientCards">
      <img src="./images/ourClients/{{ $ourclient->imgsrc }}" alt="{{ $ourclient->imgalt }}">
      <span>{{ $ourclient->span}}</span>
    </div>
  @endforeach
  </div> <!-- id="allClientCards" -->
</section>