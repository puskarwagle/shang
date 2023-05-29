<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
  function updateHiddenInputValue(element, inputName) {
    const inputValue = element.textContent;
    const tcLinks = element.closest('.tcLinks');
    const hiddenInputs = tcLinks.querySelectorAll(`input[name="${inputName}[]"], span[name="${inputName}[]"]`);
    hiddenInputs.forEach((hiddenInput) => {
      if (hiddenInput.tagName === 'SPAN') {
        hiddenInput.textContent = inputValue;
      } else {
        hiddenInput.value = inputValue;
      }
    });
  }

  function updateLinkInputs(linktitleElement) {
    const linkTextElement = linktitleElement.nextElementSibling;
    const linktitleInput = linktitleElement.nextElementSibling;
    const linktextInput = linkTextElement.nextElementSibling;
    linktitleInput.value = linktitleElement.textContent;
    linktextInput.value = linkTextElement.textContent;
  }

  function createNewElementExplo() {
    const techCardsContainer = document.querySelector('#techCards');
    const newExElement = document.createElement('div');
    newExElement.classList.add('tCards');
    newExElement.style = "border: 1px solid orange;background-color:white;";
    newExElement.setAttribute('tabindex', '0');
    newExElement.innerHTML = `
    <form action="{{ route('exploreTechs.store') }}" method="POST">
      @csrf

      <div class="tHead">
        <div class="tIcons">
          <i class="fas fa-cogs"></i>
          <input type="text" name="icon" value="fas fa-cogs">
        </div>
        <div class="tTexts">
          <span contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">Tech Title</span>
          <i class="fas fa-angle-down"></i>
          <i class="fas fa-angle-up"></i>
        </div>
      </div>

      <div class="tContent" style="border: 1px solid orange;background-color:white;">
        <div class="tcHead">
          <h3 contenteditable="true" oninput="updateLinkInputs(this, 'title')">Tech Title</h3>
          <input type="hidden" name="title" value="">
        </div>
        <div class="tcLinks">
          <a href="#" contenteditable="true" oninput="updateLinkInputs(this, 'linkTitle[]')">Link Title</a>
          <input type="hidden" name="linkTitle[]" value="" class="cmsInput">
          <p contenteditable="true" oninput="updateLinkInputs(this, 'linkText[]')">Link Text</p>
          <input type="hidden" name="linkText[]" value="" class="cmsInput">
        </div>
        <button class="add-link" type="button" onclick="addLinkSectionExpl(this)">Add more links</button>
      </div>

      <div style="display:flex;justify-content:space-around;align-items:center;">
        <button class="save" type="submit">Save Changes</button>
        
      </div>
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

<section id="exploreTech" style="border: 2px solid cornflowerblue;margin-bottom:2rem;background-color:antiquewhite;">
  <h2>Explore Tech</h2>
  <div id="techCards">
    @foreach($exploreTechs as $exploreTech)
    <div class="tCards" tabindex="0" style="border:1px solid orange;background:white;" data-id="{{ $exploreTech->id }}">
      <form action="{{ route('exploreTechs.update', $exploreTech->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="tHead">
          <div class="tIcons">
            <i class="{{ $exploreTech->icon }}"></i>
            <input type="text" name="icon" value="{{ $exploreTech->icon }}" class="cmsInput">
          </div><!-- .tIcons -->
          <div class="tTexts">
            <span>{{ $exploreTech->title }}</span>
            <i class="fas fa-angle-down"></i>
            <i class="fas fa-angle-up"></i>
          </div><!-- .tTexts -->
        </div><!-- .tHead -->

        <div class="tContent" style="border:1px solid orange;background:white;">
          <div class="tcHead">
            <h3 contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $exploreTech->title }}</h3>
            <input type="hidden" name="title" value="{{ $exploreTech->title }}" class="cmsInput">
          </div>

          @foreach ($exploreTech->links as $link)
          <div class="tcLinks">
            <a href="#" contenteditable="true" oninput="updateLinkInputs(this)">{{ $link['title'] }}</a>
            <input type="hidden" name="linkTitle[]" value="{{ $link['title'] }}" class="cmsInput">

            <p contenteditable="true" oninput="updateLinkInputs(this)">{{ $link['text'] }}</p>
            <input type="hidden" name="linkText[]" value="{{ $link['text'] }}" class="cmsInput">
          </div>
          @endforeach
          <button class="add-link" type="button" onclick="addLinkSectionExpl(this)">Add more links</button>
        </div><!-- .tContent -->

        <div style="display:flex;align-items:flex-end;justify-content:space-around;">
          <button class="save" type="submit">Save Changes</button>
          <button class="delete" type="button" onclick="deleteExploreTech('{{ $exploreTech->id }}')">Delete</button>
          <p style="color:red">ID: {{ $exploreTech->id }}</p>
        </div>
      </form>
    </div> <!-- .tCards -->
    @endforeach
  </div> <!-- #techCards -->
  <button class="create" onclick="createNewElementExplo()">Click to Create a entirely new headerProduct element.</button>
</section>


<script>
  function addLinkSectionExpl(buttonExpl) {
    const linksContainerExpl = buttonExpl.closest('.tContent');
    const newLinkSectionExpl = document.createElement('div');
    newLinkSectionExpl.classList.add('tcLinks');
    newLinkSectionExpl.innerHTML = `
      <a href="#" contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">Link Title</a>
      <input type="hidden" name="linkTitle[]" value="">
      <p contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">Link Text</p>
      <input type="hidden" name="linkText[]" value="">
    `;

    linksContainerExpl.insertBefore(newLinkSectionExpl, buttonExpl);
  }

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