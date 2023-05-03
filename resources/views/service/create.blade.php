<style>
  form {
    display: flex;
    flex-direction: column;
    width: 50%;
    margin: 0 auto;
  }

  label {
    font-weight: bold;
    margin-bottom: 5px;
  }

  input[type="text"],
  textarea {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  button[type="submit"] {
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<form method="POST" action="{{ route('services.store') }}">
    @csrf
    <div>
        <label for="icon">Icon</label>
        <input type="text" id="icon" name="icon" required>
    </div>
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <button type="submit">Add Service</button>
</form>
