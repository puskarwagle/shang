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

    function displayFormData(event) {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);
      for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
      }
      // Uncomment the following line to allow form submission after debugging
      form.submit();
    }
  </script>
</head>

<header style="display:flex;flex-direction:column; border:2px solid gold;">
  <h2>header services section</h2>
  @foreach($headerServices as $headerService)

  <div class="headerMain headerServ"
    style="overflow:visible ! important; min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;">
    <form style="display:flex;" action="{{ route('headerServices.update', $headerService->id) }}" method="POST">
      @csrf
      @method('PUT')

      <ul class="hMA">
        <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')" class="">{{ $headerService->title }}</li>
        <input type="hidden" name="title" value="{{ $headerService->title }}">
      </ul> <!-- .hMA -->

      <div class="hMB hmbPassive">
        <div class="hMBFirst">
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerService->title }} <i class="fas fa-arrow-right"></i></p>
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">{{ $headerService->title_text }}</p>
          <input type="hidden" name="title_text" value="{{ $headerService->title_text }}">
        </div>

        <div class="hMBTexts">
          @foreach ($headerService->subTT as $subT)
          <div class="hMBText">
            <p  contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['title'] }}</p>
            <input type="hidden" name="subTitles[]" value="{{ $subT['title'] }}">
            <p  contenteditable="true" oninput="updateSubTTInputs(this)">{{ $subT['text'] }}</p>
            <input type="hidden" name="subTexts[]" value="{{ $subT['text'] }}">
          </div>
          @endforeach
          <button class="add-link" type="button">Add more sub titles and texts</button>
        </div> <!-- .hMBTexts -->

      </div> <!-- .hMB -->
      <button class="save" type="submit">Save Changes</button>
      <input type="hidden" name="_method" value="DELETE">
      <button class="delete" type="button" onclick="deleteHeaderService('{{ $headerService->id }}')">Delete</button>
    </form>
  </div> <!-- .headerMain headerServ -->
  @endforeach
</header>

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
  const hMBTextsContainers = document.querySelectorAll('.hMBTexts');
  hMBTextsContainers.forEach(hMBTextsContainer => {
    const addSubTBtn = hMBTextsContainer.querySelector('.add-link');
    addSubTBtn.addEventListener('click', () => {
      const newSubTSection = document.createElement('div');
      newSubTSection.classList.add('hMBText');
      newSubTSection.innerHTML = `
        <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub title</p>
        <input type="text" name="subTitles[]" value="">
        <p contenteditable="true" oninput="updateDynamicSubTTInputs(this)">edit this sub Text</p>
        <input type="text" name="subTexts[]" value="">
      `;
      hMBTextsContainer.insertBefore(newSubTSection, addSubTBtn);
    });
  });
</script>