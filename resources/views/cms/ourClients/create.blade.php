<form class="cmsForm" method="POST" action="{{ route('ourClients.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required>
  </div>
  <div>
    <label for="imgalt">Img alt:</label>
    <input type="text" id="imgalt" name="imgalt" required>
  </div>
  <div>
    <label for="span">Span:</label>
    <input type="text" id="span" name="span" required>
  </div>
  <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add our clients</button>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  @if(session('error'))
  <div class="alert alert-error">
    {{ session('error') }}
  </div>
  @endif
</form>