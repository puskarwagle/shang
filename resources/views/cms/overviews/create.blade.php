<form class="cmsForm" method="POST" action="{{ route('overviews.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required>
  </div>
  <div>
    <label for="imgalt">imgalt:</label>
    <input type="text" id="imgalt" name="imgalt" required>
  </div>
  <div>
    <label for="titleLi">TitleLi:</label>
    <input type="text" id="titleLi" name="titleLi" required>
  </div>
  <div>
    <label for="text1">Text 1:</label>
    <input type="text" id="text1" name="text1" required>
  </div>
  <div>
    <label for="text2">Text 2:</label>
    <input type="text" id="text2" name="text2" required>
  </div>
  <div>
    <label for="text3">Text 3:</label>
    <input type="text" id="text3" name="text3" required>
  </div>
  <div>
    <label for="link">Link:</label>
    <input type="text" id="link" name="link" required>
  </div>
  <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add overviews</button>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
</form>