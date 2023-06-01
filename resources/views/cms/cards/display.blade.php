
<section id="">
  <h2>Cards</h2>
  <div id="">
    @foreach($cards as $card)
      <span>{{ $card->title }}</span>
      <span>{{ $card->routes }}</span>
      <div>{{ $card->description }}</div>
    @endforeach
  </div>
</section>