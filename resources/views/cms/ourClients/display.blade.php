<section id="happyClients">
  <div id="allClientCards">
  @foreach($ourClients as $ourClient)
    <div class="clientCards">
      <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}" width="100">
      <span>{{ $ourClient->span}}</span>
    </div>
  @endforeach
  </div>
</section>