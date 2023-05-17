<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<section id="overviews">
  <div id="">
    @foreach($overviews as $overview)
        <form class="cmsBoxDelete" action="{{ route('overviews.update', $overview->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <span style="font-size:1vw;" class="cmsInput">"images/overview/{{ $overview->imgsrc }}" --This is the current image </span>
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
          <div>
            <label for="image">Choose another image:</label>
            <input type="file" id="image" name="image">
          </div>
          <input type="text" name="imgalt" value="{{ $overview->imgalt }}" class="cmsInput">
          <input type="text" name="titleLi" value="{{ $overview->titleLi }}" class="cmsInput">
          <input type="text" name="text1" value="{{ $overview->text1 }}" class="cmsInput">
          <input type="text" name="text2" value="{{ $overview->text2 }}" class="cmsInput">
          <input type="text" name="text3" value="{{ $overview->text3 }}" class="cmsInput">
          <input type="text" name="link" value="{{ $overview->link }}" class="cmsInput">

          <div class="cmsActions">
            <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit" class="cmsButton cmsSaveButton">
              <i class="fas fa-save"></i>
            </button>
          </div>
        </form>
    @endforeach
  </div>
</section>
