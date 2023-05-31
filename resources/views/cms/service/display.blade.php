<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
  function createNewElementService() {
    const servicesContainer = document.querySelector('#allServices');
    const newServiElement = document.createElement('div');
    newServiElement.classList.add('ser');
    newServiElement.style =
      "border: 1px solid orange; background: antiquewhite; margin-bottom: 2rem;width:100%;padding:1rem;";

    newServiElement.innerHTML = `
        <form action="{{ route('service.store') }}" method="POST">
          @csrf
          <div class="box cmsBoxDisplay">
            <i style="font-size: 200%;" class="fas fa-code"></i>
            <input style="display: block;margin-right:1rem;" type="text" name="icon" value="fas fa-code">
            <div>
              <h3 contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">New Service Title</h3>
              <input type="hidden" name="title" value="">
              <p contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">New Service Description</p>
              <input type="hidden" name="description" value="">
            </div>
          </div>
          <div style="display:flex;align-items:flex-end;justify-content:flex-end;">
            <button class="cancel delete" type="button" onclick="cancelNewElementService(this)">Cancel</button>
            <button class="save" type="submit">Save</button>
          </div>
        </form>
      `;

      const createButton = document.querySelector('.create');
      const nextSibling = createButton.nextSibling;
      servicesContainer.insertBefore(newServiElement, nextSibling);
    // servicesContainer.appendChild(newServiElement);
  }
  function cancelNewElementService(cancelButton) {
    const newServiElement = cancelButton.closest('.ser');
    newServiElement.remove();
  }

  </script>
</head>

<section id="services" style="border:2px solid cornflowerblue;margin:2rem;">
  <h2>Our Services</h2>
  <div id="allServices">
  <button class="create" onclick="createNewElementService()">Create <i class="fas fa-plus"></i> </button>
    @foreach($services as $service)
    <div class="ser" style="border:1px solid orange;background:antiquewhite;margin-bottom:2rem;padding:1rem;">
      <form action="{{ route('service.update', $service->id) }}" method="POST" data-id="{{ $service->id }}">
        @csrf
        @method('PUT')
        <div class="box cmsBoxDisplay">
          <i style="font-size:200%;" class="{{ $service->icon }}"></i>
          <input style="display:block;margin-right:1rem;" type="text" name="icon" value="{{ $service->icon }}">
          <div>
            <h3 contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">{{ $service->title }}</h3>
            <input type="hidden" name="title" value="{{ $service->title }}">
            <p contenteditable="true" oninput="this.nextElementSibling.value = this.textContent;">
              {{ $service->description }}</p>
            <input type="hidden" name="description" value="{{ $service->description }}">
          </div>
        </div>
        <div style="display:flex;align-items:flex-end;justify-content:flex-end;">
          <button class="save" type="submit">Save Changes</button>
          <button class="delete" type="button" onclick="deleteService('{{ $service->id }}')">Delete</button>
          <p style="color:red">ID: {{ $service->id }}</p>
        </div>
      </form>
    </div>
    @endforeach
    
    
  </div>
</section>

<script>
function deleteService(id) {
  if (confirm('Are you sure you want to delete this service?')) {
    const form = document.createElement('form');
    form.action = `{{ route('service.destroy', ':id') }}`.replace(':id', id);
    form.method = 'POST';
    form.style.display = 'none';

    const csrfTokenInput = document.createElement('input');
    csrfTokenInput.type = 'hidden';
    csrfTokenInput.name = '_token';
    csrfTokenInput.value = '{{ csrf_token() }}';

    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';

    form.appendChild(csrfTokenInput);
    form.appendChild(methodInput);
    document.body.appendChild(form);
    form.submit();
  }
}
</script>