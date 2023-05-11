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


<script>
//IBM cards tHead click tContent display none or flex
const tCards = document.querySelectorAll('.tCards');
const i2 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(2)');
const i3 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(3)');
const iSpan = document.querySelector('#exploreTech .tCards .tHead .tTexts span');

tCards.forEach((tCard) => {
  const tHead = tCard.querySelector('.tHead');
  const tContent = tCard.querySelector('.tContent');

  tHead.addEventListener('click', () => {
    if (tCard.classList.contains('focus-within')) {
      tContent.style.display = 'none';
      tCard.classList.remove('focus-within');
    } else {
      tContent.style.display = 'flex';
      tCard.classList.add('focus-within');
    }
  });
});
</script>