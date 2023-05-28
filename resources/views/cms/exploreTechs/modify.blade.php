<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
  function updateHiddenInputValue(element, inputName) {
    const inputValue = element.textContent;
    const form = element.closest('form');
    const hiddenInput = form.querySelector(`input[name="${inputName}"]`);
    hiddenInput.value = inputValue;
  }

  function createNewElementExplo() {
  const techCardsContainer = document.querySelector('#techCards');
  const newExElement = document.createElement('div');
  newExElement.classList.add('tCards');
  newExElement.style = "border: 1px solid orange;";
  newExElement.setAttribute('tabindex', '0');
  newExElement.dataset.id = ''; // Add a unique ID to the newEx element if needed
  newExElement.innerHTML = `
    <form action="{{ route('exploreTechs.store') }}" method="POST">
      @csrf

      <div class="tHead">
        <div class="tIcons">
          <i class="fas fa-cogs"></i>
          <input type="text" name="icon" value="" class="cmsInput">
        </div>
        <div class="tTexts">
          <span contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">Tech Title</span>
          <i class="fas fa-angle-down"></i>
          <i class="fas fa-angle-up"></i>
        </div>
      </div>

      <input type="hidden" name="title" value="" class="cmsInput">

      <div class="tContent">
        <div class="tcHead">
          <h3 contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">Tech Title</h3>
        </div>
        <div class="tcLinks">
          <a href="#" contenteditable="true" oninput="updateHiddenInputValue(this, 'linkTitle[]')">Link Title</a>
          <span contenteditable="true" oninput="updateHiddenInputValue(this, 'linkText[]')">Link Text</span>
          <input type="hidden" name="linkTitle[]" value="" class="cmsInput">
          <input type="hidden" name="linkText[]" value="" class="cmsInput">
        </div>
      </div>

      <button class="save" type="submit">Save Changes</button>
      
      <!-- Remove the delete button from the newEx element -->

      <!-- Display the ID in the element -->
      <p style="color: red">ID: </p>

    </form>
  `;

  techCardsContainer.appendChild(newExElement);

  // Attach event listeners to the newly created element
  const tHead = newExElement.querySelector('.tHead');
  const tContent = newExElement.querySelector('.tContent');
  const i1 = tHead.querySelector('.tIcons i');
  const i2 = tHead.querySelector('.tTexts i:nth-child(2)');
  const i3 = tHead.querySelector('.tTexts i:nth-child(3)');
  const iSpan = tHead.querySelector('.tTexts span');
  tHead.addEventListener('click', () => {
    if (newExElement.classList.contains('focus-within')) {
      tContent.style.display = 'none';
      newExElement.classList.remove('focus-within');
      i1.style.transform = 'scale(1)';
      iSpan.style.display = 'inline-flex';
      i2.style.display = 'inline-flex';
      i3.style.display = 'none';
    } else {
      tContent.style.display = 'flex';
      newExElement.classList.add('focus-within');
      i1.style.transform = 'scale(1.5)';
      iSpan.style.display = 'none';
      i2.style.display = 'none';
      i3.style.display = 'inline-flex';
    }
  });
}
  </script>
  <style></style>
</head>

<section id="exploreTech">
  <h2>Explore Tech</h2>
  <div id="techCards">
    @foreach($exploreTechs as $exploreTech)
    <div class="tCards" tabindex="0" style="border:1px solid orange;" data-id="{{ $exploreTech->id }}">
      <form action="{{ route('exploreTechs.update', $exploreTech->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="tHead">
          <div class="tIcons">
            <i class="{{ $exploreTech->icon }}"></i>
            <input type="text" name="icon" value="{{ $exploreTech->icon }}" class="cmsInput">
          </div><!-- .tIcons -->
          <div class="tTexts">
            <span contenteditable="true"
              oninput="updateHiddenInputValue(this, 'title')">{{ $exploreTech->title }}</span>
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
            <a href="#" contenteditable="true"
              oninput="updateHiddenInputValue(this, 'linkTitle[]')">{{ $link['title'] }}</a>
            <span contenteditable="true" oninput="updateHiddenInputValue(this, 'linkText[]')">{{ $link['text'] }}</span>
            <input type="hidden" name="linkTitle[]" value="{{ $link['title'] }}" class="cmsInput">
            <input type="hidden" name="linkText[]" value="{{ $link['text'] }}" class="cmsInput">
          </div>
          @endforeach
          @endif
        </div><!-- .tContent -->

        <button class="save" type="submit">Save Changes</button>

        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        <button class="delete" type="button" onclick="deleteExploreTech('{{ $exploreTech->id }}')">Delete</button>

        <!-- Display the ID in the element -->
        <p style="color:red">ID: {{ $exploreTech->id }}</p>
      </form>
    </div> <!-- .tCards -->
    @endforeach
  </div> <!-- #techCards -->
  <button id="createExplore" onclick="createNewElementExplo()">Click to Create a entirely new headerProduct
    element.</button>
</section>


<script>
function deleteExploreTech(id) {
  if (confirm('Are you sure you want to delete this explore tech?')) {
    const form = document.createElement('form');
    form.action = `{{ route('exploreTechs.destroy', ':id') }}`.replace(':id', id);
    form.method = 'POST';
    form.style.display = 'none';

    // Add CSRF token input
    const csrfTokenInput = document.createElement('input');
    csrfTokenInput.type = 'hidden';
    csrfTokenInput.name = '_token';
    csrfTokenInput.value = '{{ csrf_token() }}';

    // Add method spoofing input
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';

    // Append inputs to the form
    form.appendChild(csrfTokenInput);
    form.appendChild(methodInput);

    // Append form to the document body
    document.body.appendChild(form);

    // Submit the form
    form.submit();
  }
}
</script>


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