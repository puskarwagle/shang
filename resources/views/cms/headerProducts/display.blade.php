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
<h2>header products section</h2>
  @foreach($headerProducts as $headerProduct)
  <div style="overflow:visible ! important; min-height:auto !important; position:static; border:2px solid gold; margin-bottom:4rem;" class="headerMain headerProd">
    <form style="display:flex;" action="{{ route('headerProducts.update', $headerProduct->id) }}" method="POST" 
    onsubmit="displayFormData(event)">
      @csrf
      @method('PUT')
      <ul class="hMA">
        <li contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerProduct->title }}</li>
        <input type="hidden" name="title" value="{{ $headerProduct->title }}">
      </ul> <!-- .hMA -->
      <div class="hMB hmbActive">
        <div class="hMBFirst">
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title')">{{ $headerProduct->title }} <i class="fas fa-arrow-right"></i></p>
          <p contenteditable="true" oninput="updateHiddenInputValue(this, 'title_text')">{{ $headerProduct->title_text }}</p>
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
          <button class="add-link" type="button">Add more sub titles and texts</button>
        </div> <!-- .hMBTexts -->


      </div> <!-- .hMB -->
      <button class="save" type="submit">Save Changes</button>
      <button class="delete" type="submit">Delete</button>
    </form>
  </div> <!-- .headerMain headerProd -->
  @endforeach
</header>

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