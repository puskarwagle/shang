<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- service.display.blade.php -->
  <link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
  
<section id="services">
  <h2>Our Services</h2>
  <div id="allServices">
    @foreach($services as $service)
        <form class="cmsBoxDelete" action="{{ route('service.update', $service->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="text" name="icon" value="{{ $service->icon }}" class="cmsInput">
          <input type="text" name="title" value="{{ $service->title }}" class="cmsInput">
          <input type="text" name="description" value="{{ $service->description }}" class="cmsInput">

          <div class="cmsActions">
            <button type="submit" class="cmsButton cmsSaveButton">
              <i class="fas fa-save"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>