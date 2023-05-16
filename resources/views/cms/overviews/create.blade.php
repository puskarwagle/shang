<form class="cmsForm" method="POST" action="{{ route('overviews.store') }}">
    @csrf
    <div>
      <label for="imgsrc">imgsrc:</label>
      <input type="text" id="imgsrc" name="imgsrc" required>
    </div>
    <div>
      <label for="imgalt">imgalt:</label>
      <input type="text" id="imgalt" name="imgalt" required>
    </div>
    <div>
      <label for="titleA">TitleLi:</label>
      <input type="text" id="titleA" name="titleA" required>
    </div>
    <div>
      <label for="title1">Text 1:</label>
      <input type="text" id="title1" name="title1" required>
    </div>
    <div>
      <label for="title2">Text 2:</label>
      <input type="text" id="title2" name="title3" required>
    </div>
    <div>
      <label for="title3">Text 3:</label>
      <input type="text" id="title3" name="title3" required>
    </div>
    <div>
      <label for="link">Link:</label>
      <input type="text" id="link" name="link" required>
    </div>
    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add overviews</button>
</form>
