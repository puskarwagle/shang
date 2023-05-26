<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    function updateHiddenInputValue(element, inputName) {
      const inputValue = element.textContent;
      const form = element.closest('form');
      const hiddenInput = form.querySelector(`input[name="${inputName}"]`);
      hiddenInput.value = inputValue;
    }
  </script>
  <style></style>
</head>

<section id="exploreTech">
  <h2>Explore Tech</h2>
  <div id="techCards">
    @foreach($exploreTechs as $exploreTech)
    <div class="tCards" tabindex="0" style="border:1px solid orange;">
      <form action="{{ route('exploreTechs.update', $exploreTech->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="tHead">
          <div class="tIcons">
            <i class="{{ $exploreTech->icon }}"></i>
            <input type="text" name="icon" value="{{ $exploreTech->icon }}" class="cmsInput">
          </div><!-- .tIcons -->
          <div class="tTexts">
            <span contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $exploreTech->title }}</span>
            <i class="fas fa-angle-down"></i>
            <i class="fas fa-angle-up"></i>
          </div><!-- .tTexts -->
        </div><!-- .tHead -->

        <input type="hidden" name="title" value="{{ $exploreTech->title }}" class="cmsInput">

        <div class="tContent">
          <div class="tcHead">
            <h3 contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $exploreTech->title }}</h3>
          </div>
          @if ($exploreTech->links)
          @foreach ($exploreTech->links as $link)
          <div class="tcLinks">
            <a href="#" contenteditable="true" oninput="updateHiddenInputValue(this, 'linkTitle[]')">{{ $link['title'] }}</a>
            <span contenteditable="true" oninput="updateHiddenInputValue(this, 'linkText[]')">{{ $link['text'] }}</span>
            <input type="hidden" name="linkTitle[]" value="{{ $link['title'] }}" class="cmsInput">
            <input type="hidden" name="linkText[]" value="{{ $link['text'] }}" class="cmsInput">
          </div>
          @endforeach
          @endif
        </div><!-- .tContent -->

        <button class="save" type="submit">Save Changes</button>
        <button class="delete" type="submit">Delete</button>
      </form>
    </div> <!-- .tCards -->
    @endforeach
  </div> <!-- #techCards -->
</section>


<script>
  // ExploreTech IBM cards tHead click tContent display none or flex
  const tCards = document.querySelectorAll('.tCards');
  document.body.addEventListener('click', (event) => {
    tCards.forEach((tCard) => {
      const tHead = tCard.querySelector('.tHead');
      const tContent = tCard.querySelector('.tContent');
      const i1 = tHead.querySelector('.tIcons i');
      const i2 = tHead.querySelector('.tTexts i:nth-child(2)');
      const i3 = tHead.querySelector('.tTexts i:nth-child(3)');
      const iSpan = tHead.querySelector('.tTexts span');

      if (!tCard.contains(event.target)) {
        tContent.style.display = 'none';
        tCard.classList.remove('focus-within');
        i1.style.transform = 'scale(1)';
        iSpan.style.display = 'inline-flex';
        i2.style.display = 'inline-flex';
        i3.style.display = 'none';
      }
    });
  });
  tCards.forEach((tCard) => {
    const tHead = tCard.querySelector('.tHead');
    const tContent = tCard.querySelector('.tContent');
    const i1 = tHead.querySelector('.tIcons i');
    const i2 = tHead.querySelector('.tTexts i:nth-child(2)');
    const i3 = tHead.querySelector('.tTexts i:nth-child(3)');
    const iSpan = tHead.querySelector('.tTexts span');
    tHead.addEventListener('click', () => {
      if (tCard.classList.contains('focus-within')) {
        tContent.style.display = 'none';
        tCard.classList.remove('focus-within');
        i1.style.transform = 'scale(1)';
        iSpan.style.display = 'inline-flex';
        i2.style.display = 'inline-flex';
        i3.style.display = 'none';
      } else {
        tContent.style.display = 'flex';
        tCard.classList.add('focus-within');
        i1.style.transform = 'scale(1.5)';
        iSpan.style.display = 'none';
        i2.style.display = 'none';
        i3.style.display = 'inline-flex';
      }
    });
  });
</script>



