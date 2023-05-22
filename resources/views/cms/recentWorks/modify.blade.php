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
  <style>
    button.save {
      margin-top:1rem;
      padding:0.5rem;
      border:2px solid green;
      border-radius:0.2vw;
      color:green;
      font-weight: 600;
    }
    button.save:hover {
      color:white;
      background-color: green;
    }
    button.delete {
      margin-top:1rem;
      padding:0.5rem;
      border:2px solid red;
      border-radius:0.2vw;
      color:red;
      font-weight: 600;
    }
    button.delete:hover {
      color:white;
      background-color: red;
    }
  </style>
</head>

<section id="recentWorks">
  <h2>Recent Works</h2>
  <div id="honey">
    @foreach($recentWorks as $recentWork)
    <form id="editForm" action="{{ route('recentWorks.update', $recentWork->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="rw">
        <div class="imgL">
          <img src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" />
          <span contenteditable="true" class="editable-titleA" oninput="updateHiddenInputValue(this, 'titleA')">{{ $recentWork->titleA }}</span>
          <span contenteditable="true" class="editable-titleB" oninput="updateHiddenInputValue(this, 'titleB')">{{ $recentWork->titleB }}</span>
        </div>
        <div class="tect editable-description" contenteditable="true" oninput="updateHiddenInputValue(this, 'description')">{{ $recentWork->description }}</div>
      </div>
      <input type="hidden" name="imgsrc" value="{{ $recentWork->imgsrc }}">
      <input type="hidden" name="imgalt" value="{{ $recentWork->imgalt }}">
      <input type="hidden" name="titleA" value="{{ $recentWork->titleA }}">
      <input type="hidden" name="titleB" value="{{ $recentWork->titleB }}">
      <input type="hidden" name="description" value="{{ $recentWork->description }}">
      <button class="save" type="submit">Save Changes</button>
      <button class="delete" type="submit">Delete</button>
    </form>
    @endforeach
  </div>
</section>


