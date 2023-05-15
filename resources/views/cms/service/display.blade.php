 
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

