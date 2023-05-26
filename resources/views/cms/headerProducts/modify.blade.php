<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="headerProduct">
  <div id="">
    @foreach($headerProducts as $headerProduct)
    <form action="{{ route('headerProducts.update', $headerProduct->id) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="title" value="{{ $headerProduct->title }}" >
      <input type="text" name="title_text" value="{{ $headerProduct->title_text }}" >

      <div class="mlin">
        @foreach ($headerProduct->subTT as $index => $subT)
        <div class="mlink-i">kk
          <label for="subTitles">Sub Title:</label>
          <input type="text" name="subTitles[]" value="{{ $subT['title'] }}">
          <label for="subTexts">sub Texts:</label>
          <input type="text" name="subTexts[]" value="{{ $subT['text'] }}">
        </div>
        @endforeach
        <button class="madd-l" type="button">Add more subTT k</button>
      </div>

      <div class="cmsActions">
        <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsSaveButton">
          Save <i class="fas fa-save"></i>
        </button>
      </div>
    </form>
    @endforeach
  </div>
</section>

<script>
  const forms = document.querySelectorAll('form');

  forms.forEach((form) => {
    const addButton = form.querySelector('.madd-l');
    const container = form.querySelector('.mlin');

    addButton.addEventListener('click', () => {
      const newSection = document.createElement('div');
      newSection.classList.add('mlink-i');
      newSection.innerHTML = `
        <label for="subTitles">Sub Title:</label>
        <input type="text" name="subTitles[]" value="">
        <label for="subTexts">sub Texts:</label>
        <input type="text" name="subTexts[]" value="">
      `;
      container.insertBefore(newSection, addButton);
    });
  });
</script>



