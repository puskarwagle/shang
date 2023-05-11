
<form class="cmsForm" method="POST" action="{{ route('recentWorks.store') }}">
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
      <label for="titleA">TitleA:</label>
      <input type="text" id="titleA" name="titleA" required>
    </div>
    
    <div>
      <label for="titleB">TitleB:</label>
      <input type="text" id="titleB" name="titleB" required>
    </div>

    <div>
      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>
    </div>
    
    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add recentWorks</button>
</form>
