<section id="exploreTech">
  <h2>Explore Tech</h2>
  <div id="techCards">
    @foreach($exploreTechs as $exploreTech)
    <div class="tCards" tabindex="0">
      <div class="tHead">
        <div class="tIcons">
          <i class="{{ $exploreTech->icon }}"></i>
        </div><!-- .tIcons -->
        <div class="tTexts">
          <span>{{ $exploreTech->title }}</span>
          <i class="fas fa-angle-down"></i>
          <i class="fas fa-angle-up"></i>
        </div><!-- .tTexts -->
      </div><!-- .tHead -->
      <div class="tContent">
        <div class="tcHead">
          <h3>{{ $exploreTech->title }}</h3>
        </div>
        @if ($exploreTech->links)
        <div class="tcLinks">
          @foreach ($exploreTech->links as $link)
          <a href="#">{{ $link['title'] }}</a>
          <span>{{ $link['text'] }}</span>
          @endforeach
        </div>
        @endif
      </div><!-- .tContent -->
    </div> <!-- .tCards -->
    @endforeach
  </div> <!-- #techCards -->
</section>
