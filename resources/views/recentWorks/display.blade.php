<!-- service.display.blade.php -->
<link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
<!-- Font-Awesome 5.15.3 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


<section id="recentWorks">
  <h2>Recent Works</h2>
  <div id="honey">
  @foreach($recentWorks as $recentWork)
    <div class="rw">
      <div class="imgL">
        <img src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" />
        <span>{{ $recentWork->titleA }}</span>
        <span>{{ $recentWork->titleB }}</span>
      </div>
      <div class="tect">{{ $recentWork->description }}</div>
    </div>
    @endforeach
  </div>
</section>