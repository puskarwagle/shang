
<form class="cmsForm" method="POST" action="{{ route('headerProducts.store') }}">
    @csrf
    <div>
      <label for="title">title:</label>
      <input type="text" id="title" name="title" required>
    </div>
    <div>
      <label for="title_text">title_text:</label>
      <input type="text" id="title_text" name="title_text" required>
    </div>
    
    <div id="links-container" style="display:flex;flex-direction:column;gap:1vw;">

      <div class="link-inputs" style="display:flex;justify-content:center;border:2px solid white;width:max-content;">
        <label for="subTitles">Sub Title:</label>
        <input type="text" name="subTitles[]" required>
        <label for="subTexts">sub Texts:</label>
        <input type="text" name="subTexts[]" required>
      </div>

      <button id="add-link" type="button">Add more sub titles and texts</button>
    </div>
    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add headerProducts</button>
</form>