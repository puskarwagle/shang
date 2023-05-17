<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<section id="ourClients">
  <div id="">
    <section id="happyClients">
      <div id="allClientCards">
        @foreach($ourClients as $ourClient)
          <div class="ClientCards">
            <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}" width="50" height="50">
            <span>{{ $ourClient->span}}</span>
            <form class="cmsBoxDelete" action="{{ route('ourClients.destroy', $ourClient->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <div class="cmsActions">
                <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsDeleteButton">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </form>
          </div>
        @endforeach
      </div>
    </section>
  </div>
</section>



