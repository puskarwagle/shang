<!-- service.display.blade.php -->
<link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
<!-- Font-Awesome 5.15.3 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  
<section id="services">
  <h2>Our Services</h2>
  <div id="allServices">
    @foreach($services as $service)
    <div class="box cmsBoxDisplay">
      <i class="{{ $service->icon }}"></i>
      <div>
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->description }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>

