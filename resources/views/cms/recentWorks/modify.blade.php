<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
  #recentWorks #honey {
    display: flex;
    flex-wrap: wrap;
    gap: 4vw;
    justify-content: center;
    padding: 3vw 2vw;
    border: 1px solid cornflowerblue;
  }
  #recentWorks #honey form {
    text-align: center;
    width: 25%;
  }
  #recentWorks #honey .rw {
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 0.5vw #000;
    border-radius: 1vw;
  }
  #recentWorks #honey .rw .tec {
    font-size: 1.2vw;
    text-align: center;
    padding: 1vw 1vw;
    border-radius: 10px;
    border: 1px solid #fff;
    box-shadow: 0 0 5px #000;
  }
  </style>
</head>

  <section id="recentWorks">
  <h2>Recent Works</h2>
  <div id="honey">
    @foreach($recentWorks as $recentWork)
      <form action="{{ route('recentWorks.update', $recentWork->id) }}" method="POST" data-id="{{ $recentWork->id }}" 
          style="border:2px solid gold;background-color:antiquewhite;border-radius:1vw;">
        @csrf
        @method('PUT')

        <div class="rw">
          <div class="imgL">
            <label for="imageInput{{ $recentWork->id }}">
              <img id="preview{{ $recentWork->id }}" src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" width="100">
            </label>
            <input type="file" id="imageInput{{ $recentWork->id }}" name="image" accept="image/*" style="display:none;">
            <input type="text" name="imgsrc" value="{{ $recentWork->imgsrc }}">
            <span contenteditable="true" oninput="updateHiddenInputValue(this, 'titleA')">{{ $recentWork->titleA }}</span>
            <span style="font-weight:100;font-size:1rem;" contenteditable="true" oninput="updateHiddenInputValue(this, 'titleB')">{{ $recentWork->titleB }}</span>
          </div>
          <div class="tec" contenteditable="true" oninput="updateHiddenInputValue(this, 'description')">{{ $recentWork->description }}</div>
        </div>

        <input type="hidden" name="imgalt" value="{{ $recentWork->imgalt }}">
        <input type="hidden" name="titleA" value="{{ $recentWork->titleA }}">
        <input type="hidden" name="titleB" value="{{ $recentWork->titleB }}">
        <input type="hidden" name="description" value="{{ $recentWork->description }}">

        <div style="display:flex;margin-top:1rem;">
          <button class="save" type="submit">Save Changes</button>
          <button class="delete" type="button" onclick="deleteRecentWork('{{ $recentWork->id }}')">Delete</button>
          <p style="color:red">ID: {{ $recentWork->id }}</p>
        </div>
      </form>
    @endforeach
    <button class="create" onclick="createNewElementRecentWork()">Click to Create a New Recent Work</button>
  </div>
</section>

<script>
    const imageLabels = document.querySelectorAll('.imgL label');

    imageLabels.forEach(function(label) {
      const input = label.nextElementSibling;
      const preview = label.querySelector('img');

      label.addEventListener('click', function(e) {
        e.preventDefault();
        input.click();
      });

      input.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
          preview.src = reader.result;
        };

        reader.readAsDataURL(file);
      });
    });


  function updateHiddenInputValue(element, inputName) {
    const form = element.closest('form');
    const hiddenInput = form.querySelector(`input[name="${inputName}"]`);
    hiddenInput.value = element.innerText;
  }

  function createNewElementRecentWork() {
    const honeyContainer = document.getElementById('honey');
    const newRecentWorkElement = document.createElement('form');
    newRecentWorkElement.action = "{{ route('recentWorks.store') }}";
    newRecentWorkElement.method = "POST";
    newRecentWorkElement.enctype = "multipart/form-data";
    newRecentWorkElement.style = "border:2px solid gold;background-color:antiquewhite;border-radius:1vw;";

    const csrfTokenInput = document.createElement('input');
    csrfTokenInput.type = 'hidden';
    csrfTokenInput.name = '_token';
    csrfTokenInput.value = '{{ csrf_token() }}';
    newRecentWorkElement.appendChild(csrfTokenInput);
    newRecentWorkElement.innerHTML = `
      <div class="rw">
        <div class="imgL">
          <label for="imageInput{{ $recentWork->id }}">
            <img id="preview{{ $recentWork->id }}" src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" width="100">
          </label>
          <input type="file" id="imageInput{{ $recentWork->id }}" name="image" accept="image/*" style="display:none;">
          <span style="font-size:1.5rem;font-weight:600;" contenteditable="true" oninput="updateHiddenInputValue(this, 'titleA')">Default Title A</span>
          <span style="font-size:1rem;" contenteditable="true" oninput="updateHiddenInputValue(this, 'titleB')">Default Title B</span>
        </div>
        <div class="tec" contenteditable="true" oninput="updateHiddenInputValue(this, 'description')">Default Description</div>
      </div>

      <input type="hidden" name="imgsrc" value="./images/recentWorks/default_image.jpg">
      <input type="hidden" name="imgalt" value="Default Image Alt">
      <input type="hidden" name="titleA" value="">
      <input type="hidden" name="titleB" value="">
      <input type="hidden" name="description" value="">

      <div style="display:inline-block;">
        <button style="margin-top:1rem;" class="save" type="submit">Save New Element</button>
      </div>
      `;

    honeyContainer.appendChild(newRecentWorkElement);
  }

  function deleteRecentWork(id) {
    if (confirm('Are you sure you want to delete this recent work?')) {
      const form = document.createElement('form');
      form.action = `{{ route('recentWorks.destroy', ':id') }}`.replace(':id', id);
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
