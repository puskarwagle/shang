<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
  
<section id="services">
  <h2>Our Services</h2>
  <div id="allServices">
    @foreach($services as $service)
        <form class="box cmsBoxDelete" action="{{ route('service.destroy', $service->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <i class="{{ $service->icon }}"></i>
          <div>
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
          </div>
          <div class="cmsActions">
            <button type="submit" class="cmsButton cmsDeleteButton">
              <i class="fas fa-trash-alt"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>

