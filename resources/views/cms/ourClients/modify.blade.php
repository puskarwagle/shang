<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
  function createNewElementClient() {
    const ourClientsContainer = document.getElementById('ourClients');
    const newClientElement = document.createElement('div');
    newClientElement.classList.add('ourClient');
    newClientElement.style =
      "border:2px solid orange;border-radius:0.5vw;margin:1rem;background-color:antiquewhite;padding:2rem;";
      newClientElement.innerHTML = `
        <form action="{{ route('ourClients.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="ClientCards">
            <img src="./images/ourClients/who.png" alt="Default Image who logo" width="100">
            <span>Default Span</span>
          </div>

          <div style="margin-top:1rem;display:inline-flex;flex-direction:column;">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <label for="imgalt">Img alt:</label>
            <input type="text" id="imgalt" name="imgalt" value="">
            <label for="span">Span:</label>
            <input type="text" id="span" name="span" value="">

            <button class="cancel delete" type="button" onclick="cancelNewElementClient(this)">Cancel</button>
            <button style="margin-top:1rem;" class="Create save" type="submit">Save New element</button>
          </div>
        </form>
      `;

      ourClientsContainer.insertBefore(newClientElement, ourClientsContainer.firstChild);
  }
    function cancelNewElementClient(cancelButton) {
      const newClientElement = cancelButton.closest('.ourClient');
      newClientElement.remove();
    }
  </script>
</head>

<div id="ajsdfkk" style="border: 2px solid cornflowerblue;margin:2rem;">
  <h1 style="margin:2rem;font-size:2rem;">Our Clients</h1>
  <button class="create" style="height:100%;margin-left:1rem;" onclick="createNewElementClient()">Create <i class="fas fa-plus"></i></button>
  <section id="ourClients" style="display:flex;flex-wrap:wrap;">
    @foreach($ourClients as $ourClient)
    <div class="ourClient"
      style="border:2px solid orange;border-radius:0.5vw;margin:1rem;background-color:antiquewhite;padding:2rem;"
      data-id="{{ $ourClient->id }}">

      <form action="{{ route('ourClients.update', $ourClient->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ClientCards">
          <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}" width="100">
          <span>{{ $ourClient->span }}</span>
        </div>

        <div style="display:inline-flex;flex-direction:column;margin-top:1rem;">
          <label for="image{{ $ourClient->id }}">Image:</label>
          <input type="file" id="image{{ $ourClient->id }}" name="image">
          <label for="imgalt{{ $ourClient->id }}">Img alt:</label>
          <input type="text" id="imgalt{{ $ourClient->id }}" name="imgalt" value="{{ $ourClient->imgalt }}">
          <label for="span{{ $ourClient->id }}">Span:</label>
          <input type="text" id="span{{ $ourClient->id }}" name="span" value="{{ $ourClient->span }}">
        </div>

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

        <div style="display:flex;align-items:baseline;margin-top:1rem;gap:1rem;">
          <button class="save" type="submit">Save Changes</button>
          <button class="delete" type="button" onclick="deleteOurClient('{{ $ourClient->id }}')">Delete</button>
          <p style="color:red">ID: {{ $ourClient->id }}</p>
        </div>
      </form>
    </div>
    @endforeach
  </section>
</div>

<script>
function deleteOurClient(id) {
  if (confirm('Are you sure you want to delete this client?')) {
    const form = document.createElement('form');
    form.action = `{{ route('ourClients.destroy', ':id') }}`.replace(':id', id);
    form.method = 'POST';
    form.style.display = 'none';

    // Add CSRF token input
    const csrfTokenInput = document.createElement('input');
    csrfTokenInput.type = 'hidden';
    csrfTokenInput.name = '_token';
    csrfTokenInput.value = '{{ csrf_token() }}';

    // Add method spoofing input
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';

    // Append inputs to the form
    form.appendChild(csrfTokenInput);
    form.appendChild(methodInput);

    // Append form to the document body
    document.body.appendChild(form);

    // Submit the form
    form.submit();
  }
}
</script>