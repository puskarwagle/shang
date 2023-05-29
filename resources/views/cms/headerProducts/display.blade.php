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

  function createNewElementProd() {
    const headerContainer = document.querySelector('.hp');
    const newProdElement = document.createElement('div');
    newProdElement.classList.add('headerMain', 'headerProd');
    newProdElement.style =
      "overflow:visible ! important; min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;";
    newProdElement.innerHTML = `
        <form style="display:flex;" action="{{ route('headerProducts.store') }}" method="POST">
          @csrf
          <ul class="hMA">
            <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">product title</li>
            <input type="hidden" name="title" value="">
          </ul>

          <div class="hMB hmbActive">
            <div class="hMBFirst">
              <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">edit product title</p>
              <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">edit product title_text</p>
              <input style="height: 100%;" type="hidden" name="title_text" value="">
            </div>

            <div class="hMBTexts">
              <div class="hMBText">
                <p contenteditable="true" oninput="updateSubTTInputs(this)">edit product sub title</p>
                <input type="hidden" name="subTitles[]" value="">
                <p contenteditable="true" oninput="updateSubTTInputs(this)">edit product sub title_text</p>
                <input type="hidden" name="subTexts[]" value="">
              </div>
              <button class="add-link" type="button" onclick="addSubTitleAndTextProd(this)">Add more sub titles and texts</button>
            </div>
          </div>

          <button class="Create" type="submit">Save New element</button>
        </form>
      `;

    headerContainer.appendChild(newProdElement);
  }
  </script>
</head>

<section id="headerPr">
  <header style="display:flex;flex-direction:column;border:2px solid cornflowerblue;margin:2rem;" class="hp">
    <h2 style="margin:1rem auto 2rem 0;">header products section</h2>
    @foreach($headerProducts as $headerProduct)

    <div class="headerMain headerProd"
      style="background-color:antiquewhite;min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;"
      data-id="{{ $headerProduct->id }}">

      <form style="display:flex;" action="{{ route('headerProducts.update', $headerProduct->id) }}" method="POST"
        onsubmit="event.preventDefault(); updateHeaderProduct(event, '{{ $headerProduct->id }}')">
        @csrf
        @method('PUT')

        <ul class="hMA">
          <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerProduct->title }}</li>
          <input type="hidden" name="title" value="{{ $headerProduct->title }}">
        </ul> <!-- .hMA -->

        <div class="hMB hmbActive">
          <div class="hMBFirst">
            <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerProduct->title }} <i
                class="fas fa-arrow-right"></i></p>
            <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">
              {{ $headerProduct->title_text }}</p>
            <input style="height: 100%;" type="hidden" name="title_text" value="{{ $headerProduct->title_text }}">
          </div>

          <div class="hMBTexts">
            @foreach ($headerProduct->subTT as $subT)
            <div class="hMBText">
              <p contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['title'] }}</p>
              <input type="hidden" name="subTitles[]" value="{{ $subT['title'] }}">
              <p contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['text'] }}</p>
              <input type="hidden" name="subTexts[]" value="{{ $subT['text'] }}">
            </div>
            @endforeach
            <button class="add-link" type="button" onclick="addSubTitleAndTextProd(this)">Add more sub titles and
              texts</button>
          </div> <!-- .hMBTexts -->


        </div> <!-- .hMB -->

        <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:flex-end;">
          <p style="color:red">ID: {{ $headerProduct->id }}</p>
          <input type="hidden" name="_method" value="DELETE">
          <button class="delete" type="button" onclick="deleteHeaderProduct('{{ $headerProduct->id }}')">Delete</button>
          <button class="save" type="submit">Save Changes</button>
        </div>
      </form>
    </div> <!-- .headerMain headerProd -->
    @endforeach

    <button class="create" onclick="createNewElementProd()">Click to Create a entirely new headerProduct
      element.</button>
  </header>
</section>

<script>
function updateHeaderProduct(event, id) {
  if (confirm('Are you sure you want to update this header product ?')) {
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
function deleteHeaderProduct(id) {
  if (confirm('Are you sure you want to delete this header product?')) {
    const form = document.createElement('form');
    form.action = `{{ route('headerProducts.destroy', ':id') }}`.replace(':id', id);
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
function addSubTitleAndTextProd(buttonProd) {
  const hMBTextsContainerProd = buttonProd.closest('.hMB').querySelector('.hMBTexts');
  const newSubTSectionProd = document.createElement('div');
  newSubTSectionProd.classList.add('hMBText');
  newSubTSectionProd.innerHTML = `
      <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub title p</p>
      <input type="hidden" name="subTitles[]" value="">
      <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub Text p</p>
      <input type="hidden" name="subTexts[]" value="">
    `;
  hMBTextsContainerProd.insertBefore(newSubTSectionProd, buttonProd);
}
</script>