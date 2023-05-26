<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<h4 style="text-align:center;">Our Clients</h4>
<section id="ourClients" style="display:flex;flex-wrap:wrap;padding:2rem;">
    @foreach($ourClients as $ourClient)
      <div style="border:2px solid orange;border-radius:0.5vw;margin:1rem;" class="ourClient">
        <form class="cmsBoxDelete" action="{{ route('ourClients.update', $ourClient->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="ClientCards">
            <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}" width="100">
            <span>{{ $ourClient->span }}</span>
          </div>

          <div style="display:inline-flex;flex-direction:column;">
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

          <button class="save" type="submit">Save Changes</button>
          <button class="delete" type="submit">Delete</button>
        </form>
      </div>
    @endforeach
</section>
