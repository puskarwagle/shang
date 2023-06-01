
<form method="POST" action="{{ route('cards.store') }}">
  @csrf
  <div>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
  </div>
  <div>
    <label for="routes">Route to Page:</label>
    <input type="text" id="routes" name="routes" required>
  </div>
  <div>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" cols="50" required></textarea>
  </div>
  <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add Cards</button>
</form>
