<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
  function updateHiddenInputValue(element, inputName) {
    const inputValue = element.textContent;
    const form = element.closest('form');
    const hiddenInput = form.querySelector(`input[name="${inputName}"]`);
    hiddenInput.value = inputValue;
  }

  function updateSubTTInputs(subtitleElement) {
    const subTextElement = subtitleElement.nextElementSibling;
    const titleInput = subtitleElement.nextElementSibling;
    const textInput = subTextElement.nextElementSibling;

    titleInput.value = subtitleElement.textContent;
    textInput.value = subTextElement.textContent;
  }

  function updateDynamicSubTTInputs(subtitleElement) {
    const subTextElement = subtitleElement.nextElementSibling;
    const titleInput = subtitleElement.nextElementSibling;
    const textInput = subTextElement.nextElementSibling;

    titleInput.value = subtitleElement.textContent;
    textInput.value = subTextElement.textContent;
  }

  function createNewElementServ() {
    const headerContainer = document.querySelector('.hs');
    const newServiceElement = document.createElement('div');
    newServiceElement.classList.add('headerMain', 'headerServ');
    newServiceElement.style =
      "background-color:antiquewhite;min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;";
    newServiceElement.innerHTML = `
    <form style="display:flex;" action="{{ route('headerServices.store') }}" method="POST">
      @csrf
      <ul class="hMA">
        <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">service title</li>
        <input type="hidden" name="title" value="">
      </ul>

      <div class="hMB hmbPassive">
        <div class="hMBFirst">
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">edit service title <i class="fas fa-arrow-right"></i></p>
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">edit service title_text</p>
          <input style="height: 100%;" type="hidden" name="title_text" value="">
        </div>

        <div class="hMBTexts">
          <div class="hMBText">
            <p contenteditable="true" oninput="updateSubTTInputs(this)">edit service sub title</p>
            <input type="hidden" name="subTitles[]" value="">
            <p contenteditable="true" oninput="updateSubTTInputs(this)">edit service sub title_text</p>
            <input type="hidden" name="subTexts[]" value="">
          </div>
          <button class="add-link" type="button" style="height:100%;" onclick="addSubTitleAndTextServ(this)">Add more sub titles and texts</button>
        </div>
      </div>

      <button class="cancel delete" type="button" style="height:2rem;" onclick="cancelNewElementServ(this)">Cancel</button>
      <button class="Create save" style="height:100%;" type="submit">Save New element</button>
    </form>
  `;

    //headerContainer.appendChild(newServiceElement);
    headerContainer.insertBefore(newServiceElement, headerContainer.firstChild);
  }
    function cancelNewElementServ(cancelButton) {
      const newServiceElement = cancelButton.closest('.headerServ');
      newServiceElement.remove();
    }
  </script>
</head>

<section id="headerSe">
  <header style="display:flex;flex-direction:column;border:2px solid cornflowerblue;margin:2rem;" class="hs">
  <h2 style="margin:1rem auto 2rem 0;font-size:2rem;">Header Service</h2>
  <button class="create" onclick="createNewElementServ()">Create <i class="fas fa-plus"></i></button>
    @foreach($headerServices as $headerService)
    <div class="headerMain headerServ"
      style="background-color:antiquewhite; min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;"
      data-id="{{ $headerService->id }}">

      <form style="display:flex;" action="{{ route('headerServices.update', $headerService->id) }}" method="POST"
        onsubmit="event.preventDefault(); updateHeaderService(event, '{{ $headerService->id }}')">
        @csrf
        @method('PUT')

        <ul class="hMA">
          <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')" class="">
            {{ $headerService->title }}</li>
          <input type="hidden" name="title" value="{{ $headerService->title }}">
        </ul> <!-- .hMA -->

        <div class="hMB hmbActive">
          <div class="hMBFirst">
            <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerService->title }} 
            <i class="fas fa-arrow-right"></i></p>
            <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">
              {{ $headerService->title_text }}</p>
            <input type="hidden" name="title_text" value="{{ $headerService->title_text }}">
          </div>

          <div class="hMBTexts">
            @foreach ($headerService->subTT as $subT)
            <div class="hMBText">
              <p contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['title'] }}</p>
              <input type="hidden" name="subTitles[]" value="{{ $subT['title'] }}">
              <p contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['text'] }}</p>
              <input type="hidden" name="subTexts[]" value="{{ $subT['text'] }}">
            </div>
            @endforeach
            <button class="add-link" style="height:2rem;" type="button" onclick="addSubTitleAndTextServ(this)">Add more sub titles and
              texts</button>
          </div> <!-- .hMBTexts -->
        </div> <!-- .hMB -->

        <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:flex-end;">
          <p style="color:red">ID: {{ $headerService->id }}</p>
          <input type="hidden" name="_method" value="DELETE">
          <button class="delete" type="button" onclick="deleteHeaderService('{{ $headerService->id }}')">Delete</button>
          <button class="save" type="submit">Save Changes</button>
        </div>

      </form>
    </div> <!-- .headerMain headerServ -->
    @endforeach
  </header>
</section>

<script>
function updateHeaderService(event, id) {
  if (confirm('Are you sure you want to update this header service ?')) {
    const form = event.target;
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PUT';
    form.appendChild(methodInput);
    form.submit();
  }
}
</script>

<script>
  function deleteHeaderService(id) {
    if (confirm('Are you sure you want to delete this header service?')) {
      const form = document.createElement('form');
      form.action = `{{ route('headerServices.destroy', ':id') }}`.replace(':id', id);
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
function addSubTitleAndTextServ(buttonServ) {
  const hMBTextsContainerServ = buttonServ.closest('.hMB').querySelector('.hMBTexts');
  const newSubTSectionServ = document.createElement('div');
  newSubTSectionServ.classList.add('hMBText');
  newSubTSectionServ.innerHTML = `
      <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub title p</p>
      <input type="hidden" name="subTitles[]" value="">
      <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub Text p</p>
      <input type="hidden" name="subTexts[]" value="">
    `;
  hMBTextsContainerServ.insertBefore(newSubTSectionServ, buttonServ);
}
</script>