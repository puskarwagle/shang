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
</head>

<section id="consult" style="border:2px solid goldenrod;">
  <h2>Overview</h2>
  @foreach($overviews as $overview)

  <div class="overV">
    <form style="margin-bottom:2rem;border:2px solid gold;" action="{{ route('overviews.update', $overview->id) }}"
      method="POST" data-id="{{ $overview->id }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <ul id="consult-list">
        <li contenteditable="true" oninput="updateHiddenInputValue(this, 'titleLi')">{{ $overview->titleLi }}</li>
      </ul>

      <div class="inConsult">
        <label for="imageInput{{ $overview->id }}" class="imgL">
          <img id="preview{{ $overview->id }}" src="./images/overview/{{ $overview->imgsrc }}"
            alt="{{ $overview->imgalt }}" width="100">
        </label>
        <input type="file" id="imageInput{{ $overview->id }}" name="image" accept="image/*" style="display:none;">

        <div class="col-md-4 inConsultText d-flex flex-column pt-4 px-5">
          <span class="mb-4 pe-2" contenteditable="true"
            oninput="updateHiddenInputValue(this, 'link')">{{ $overview->link }}</span>
          <span class="mb-4" contenteditable="true"
            oninput="updateHiddenInputValue(this, 'text1')">{{ $overview->text1 }}</span>
          <a class="text-nowrap pe-1 text-decoration-none" contenteditable="true" href="{{ $overview->text2 }}"
            oninput="updateHiddenInputValue(this, 'text3')">{{ $overview->text3 }}</a>
        </div>
      </div>

      <div>
        <label for="imgalt">Image Alt:</label>
        <input type="text" name="imgalt" id="imgalt" value="{{ $overview->imgalt }}" />
      </div>

      <div style="display:flex;">
        <label for="text2">Link for the blue text:</label>
        <input style="width:70%;" type="text" name="text2" id="text2" value="{{ $overview->text2 }}" />
      </div>

      <input type="hidden" name="link" id="link" value="{{ $overview->link }}" />
      <input type="hidden" name="titleLi" value="{{ $overview->titleLi }}">
      <input type="hidden" name="text1" value="{{ $overview->text1 }}">
      <input type="hidden" name="text3" value="{{ $overview->text3 }}">

      <div>
        <button class="save" type="submit">Save Changes</button>
        <button class="delete" type="button" onclick="deleteOverview('{{ $overview->id }}')">Delete</button>
      </div>

      <!-- Display the ID in the element -->
      <p style="color:red">ID: {{ $overview->id }}</p>

    </form>
  </div>
  @endforeach
  <button id="createOverview" onclick="createNewElementOverview()">Click to Create a New Overview</button>
</section>

<script>
  function createNewElementOverview() {
    const consultContainer = document.getElementById('consult');
    const newOverviewElement = document.createElement('div');
    newOverviewElement.classList.add('overV');
    newOverviewElement.innerHTML = `
      <form style="margin-bottom:2rem;border:2px solid gold;" action="{{ route('overviews.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf

        <ul id="consult-list">
          <li contenteditable="true" oninput="updateHiddenInputValue(this, 'titleLi')">Default Title</li>
        </ul>

        <div class="inConsult">
          <label for="imageInput" class="imgL">
            <img id="preview" src="" alt="" width="100">
          </label>
          <input type="file" id="imageInput" name="image" accept="image/*" style="display:none;">

          <div class="col-md-4 inConsultText d-flex flex-column pt-4 px-5">
            <span class="mb-4 pe-2" contenteditable="true" oninput="updateHiddenInputValue(this, 'link')">Default Link</span>
            <span class="mb-4" contenteditable="true" oninput="updateHiddenInputValue(this, 'text1')">Default Text 1</span>
            <a class="text-nowrap pe-1 text-decoration-none" contenteditable="true" oninput="updateHiddenInputValue(this, 'text3')">Default Text 3</a>
          </div>
        </div>

        <div>
          <label for="imgalt">Image Alt:</label>
          <input type="text" name="imgalt" id="imgalt" value="Default Image Alt" />
        </div>

        <div style="display:flex;">
          <label for="text2">Link for the blue text:</label>
          <input style="width:70%;" type="text" name="text2" id="text2" value="Default Link" />
        </div>

        <input type="hidden" name="link" id="link" value="Default Link" />
        <input type="hidden" name="titleLi" value="Default Title">
        <input type="hidden" name="text1" value="Default Text 1">
        <input type="hidden" name="text3" value="Default Text 3">

        <div>
          <button class="save" type="submit">Save New Element</button>
        </div>
      </form>
    `;

    // Set up image preview functionality
    const imageLabel = newOverviewElement.querySelector('label[for="imageInput"]');
    const imageInput = newOverviewElement.querySelector('#imageInput');
    const imagePreview = newOverviewElement.querySelector('#preview');

    imageLabel.addEventListener('click', function(event) {
      event.preventDefault();
      imageInput.click();
    });

    imageInput.addEventListener('change', function(event) {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function() {
        imagePreview.src = reader.result;
      };

      reader.readAsDataURL(file);
    });

    consultContainer.appendChild(newOverviewElement);
  }
</script>


<script>
function deleteOverview(id) {
  if (confirm('Are you sure you want to delete this overview?')) {
    const form = document.createElement('form');
    form.action = `{{ route('overviews.destroy', ':id') }}`.replace(':id', id);
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


const overImageLabels = document.querySelectorAll('.inConsult label');
overImageLabels.forEach(function(overLabel) {
  const overInput = overLabel.nextElementSibling;
  const overPreview = overLabel.querySelector('img');

  overLabel.addEventListener('click', function(event) {
    event.preventDefault();
    overInput.click();
  });

  overInput.addEventListener('change', function(event) {
    const overFile = event.target.files[0];
    const overReader = new FileReader();

    overReader.onload = function() {
      overPreview.src = overReader.result;
    };

    overReader.readAsDataURL(overFile);
  });
});
</script>