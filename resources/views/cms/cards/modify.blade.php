<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    function createNewElementCards() {
    const ccCardsContainer = document.querySelector('#cantCards');
    const newCardElement = document.createElement('div');
    newCardElement.classList.add('cantCards');
    newCardElement.style = "border: 1px solid orange;width:50%;";
    newCardElement.innerHTML = `
    <form style="padding:2rem;background-color:antiquewhite;;border:1px solid gray;" action="{{ route('cards.store') }}" method="POST">
      @csrf
      <span style="padding:0.4rem;color:rgba(33, 37, 41, 0.75);;" contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">New Cards span</span>
      <input type="hidden" style="height:2rem;margin-top:1rem;" name="title" value="">
      <p style="margin-top:2rem;">
        <span style="padding:0.4rem;" contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">New Cards description. Read more about shangrila and it influence over the IT sector in Nepal.</span>
        <input type="hidden" name="description" value="">
      </p>
      <input type="text" name="routes" value="">
      <i style="float:right;" class="fas fa-arrow-right"></i>
      <div style="margin-top:2rem;display:flex;justify-content:space-around;align-items:center;">
        <button class="cancel delete" type="button" onclick="cancelNewElementCards(this)">Cancel</button>
        <button class="save" type="submit">Save Changes</button>
      </div>
    </form>
  `;
    ccCardsContainer.appendChild(newCardElement);
  }

    function cancelNewElementCards(cancelButton) {
      const newCardElement = cancelButton.closest('.cantCards');
      newCardElement.remove();
    }
  </script>
</head>

<body>
<section id="Cards" style="border:2px solid cornflowerblue;margin:2rem;padding:2rem;">
  <h2 style="font-size:2rem;">4 Cards</h2>
  <button class="create" onclick="createNewElementCards()">Create <i class="fas fa-plus"></i></button>
  <div id="cantCards" style="display:flex;flex-wrap:wrap;">
    @foreach($cards as $card)
    <form style="padding:2rem;background-color:antiquewhite;border: 1px solid orange;width:50%;" action="{{ route('cards.update', $card->id) }}" method="POST">
      @csrf
      @method('PUT')
      <span style="padding:0.4rem;color:rgba(33, 37, 41, 0.75);;" contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">{{ $card->title }}</span>
      <input type="hidden" name="title" value="{{ $card->title }}">
      <p style="margin-top:2rem;">
        <span style="padding:0.4rem;" contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">{{ $card->description }}</span>
        <input type="hidden" name="description" value="{{ $card->description }}">
      </p>

      <div>
        <label for="routes"></label>
        <select name="routes" style="height: 3rem; margin-top: 1rem;">
          <option value="">Choose Route</option>
          <option value="route1" @if ($card->routes == 'route1') selected @endif>{{ route('products') }}</option>
          <option value="route2" @if ($card->routes == 'route2') selected @endif>{{ route('mission') }}</option>
          <option value="route3" @if ($card->routes == 'route3') selected @endif>{{ route('internship') }}</option>
          <option value="route4" @if ($card->routes == 'route4') selected @endif>{{ route('dataCenterServices') }}</option>
        </select>
      </div>


      <i style="float:right;" class="fas fa-arrow-right"></i>
        <div style="margin-top:2rem;" class="buttons">
          <button class="save" onclick="return confirm('Are you sure you want to submit this form?')" type="submit">
            <i class="fas fa-save"></i>
          </button>
          <button class="delete" type="button" onclick="deleteCards('{{ $card->id }}')">Delete</button>
        </div>
      </form>
    @endforeach
  </div>
</section>

<script>
  function deleteCards(id) {
    if (confirm('Are you sure you want to delete this Card ?')) {
      const form = document.createElement('form');
      form.action = `{{ route('cards.destroy', ':id') }}`.replace(':id', id);
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
</body>