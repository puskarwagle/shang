
<form class="cmsForm" method="POST" action="{{ route('service.store') }}">
    @csrf
    <div>
        <label for="icon">Icon:</label>
        <input type="text" id="icon" name="icon" required>
    </div>
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add Service</button>
</form>
