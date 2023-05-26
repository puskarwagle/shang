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

<section id="consult">
  <h2>Overview</h2>
  @foreach($overviews as $overview)
  <form style="margin-bottom:2rem;border:2px solid gold;" action="{{ route('overviews.update', $overview->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <ul id="consult-list">
      <li contenteditable="true" oninput="updateHiddenInputValue(this, 'titleLi')">{{ $overview->titleLi }}</li>
    </ul>

    <div class="inConsult">
      <img style="height:200px" src="./images/overview/{{ $overview->imgsrc }}" alt="{{ $overview->imgalt }}">
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
      <label for="image">Choose another image:</label>
      <input type="file" id="image" name="image">
    </div>

    <label for="imgalt">Image Alt:</label>
    <input type="text" name="imgalt" id="imgalt" value="{{ $overview->imgalt }}"/>
    <label for="text2">Link for the blue text:</label>
    <input type="text" name="text2" id="text2" value="{{ $overview->text2 }}"/>

    <input type="hidden" name="link" id="link" value="{{ $overview->link }}" />
    <input type="hidden" name="titleLi" value="{{ $overview->titleLi }}">
    <input type="hidden" name="text1" value="{{ $overview->text1 }}">
    <input type="hidden" name="text3" value="{{ $overview->text3 }}">
    <button class="save" type="submit">Save Changes</button>
    <button class="delete" type="submit">Delete</button>
  </form>
  @endforeach
</section>