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
    #recentWorks #honey {
      display: flex;
      flex-wrap: wrap;
      gap:4vw;
      justify-content: center;
      padding: 3vw 2vw;
      border:1px solid orange;
    }
    #recentWorks #honey form {
      text-align: center;
      width:25%;
    }
    #recentWorks #honey .rw {
      display:flex;
      flex-direction: column;
      box-shadow: 0 0 0.5vw #000;
      border-radius: 1vw;
    }
    #recentWorks #honey .rw .tec {
      font-size:1.2vw;
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
    <form action="{{ route('recentWorks.update', $recentWork->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="rw">
        <div class="imgL">
          <img src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" />
          <span contenteditable="true" oninput="updateHiddenInputValue(this, 'titleA')">{{ $recentWork->titleA }}</span>
          <span contenteditable="true" oninput="updateHiddenInputValue(this, 'titleB')">{{ $recentWork->titleB }}</span>
        </div>
        <div class="tec" contenteditable="true" oninput="updateHiddenInputValue(this, 'description')">{{ $recentWork->description }}</div>
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


