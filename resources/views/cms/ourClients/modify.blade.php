<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<section id="ourClients">
  <div id="">
    @foreach($ourclients as $ourclient)
        <form class="cmsBoxDelete" action="{{ route('ourClients.update', $ourClient->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <span style="font-size:1vw;" class="cmsInput">"images/ourClient/{{ $ourclient->imgsrc }}" --This is the current image </span>
          @foreach($ourclients as $ourclient)
            <div class="clientCards">
              <img src="./images/ourClients/{{ $ourclient->imgsrc }}" alt="{{ $ourclient->imgalt }}">
              <span>{{ $ourclient->span}}</span>
            </div>
          @endforeach
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          @if(session('success'))
          <div class="alert alert-error">
            {{ session('error') }}
          </div>
          @endif
          

          <div class="cmsActions">
            <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsSaveButton">
              <i class="fas fa-save"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>
