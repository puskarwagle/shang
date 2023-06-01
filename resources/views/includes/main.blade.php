<!-- <section id="intern" class="text-white d-flex">

  <div class="col-md-11">
    <p>Register now: You're invited to the Shangrila Internship event, 9–11 May, Ghattekulo, Kathmandu</p>
  </div>
  <div class="col-md-1">
    <a href="#" class="">
      X
    </a>
  </div>
</section><br> -->

<section id="about" class="p-4 row d-flex" style="font-size: 1rem;">
  <div class="col-md-7 col-lg-6 d-inline-flex flex-column">
    <h2 class="mb-2">Working towards excellence in ensuring Digital Governance in Nepal.</h2>
    <p class="mb-5">See how local governments are automated using software like DOT NET to deliver services more efficiently.
      This is the third line. This is a good line.</p>
    <a href="{{ route('about') }}" class="btn btn-primary rounded-0 d-inline-flex gap-3" style="max-width:fit-content">
      <span>Get to know Shangrila</span>
      <i class="align-self-center fas fa-arrow-right ml-2"></i>
    </a>
  </div>
  <div class="col-md-12 col-lg-6">
    <video width="100%" height="100%" poster="/images/overview.jpg" controls>
      <source src="./videos/PDF-Form_Signing.webm" type="video/webm">
      Your browser does not support the video tag.
    </video>
  </div>
</section>

<section class="p-4">
  <div class="mx-2 d-flex flex-wrap row" style="font-size: 1rem;">

  @foreach($cards as $card)
    <a href="{{ $card->routes }}" class="col-md-6 rounded-0 p-3 card text-decoration-none csCard" 
       style="background-color:hsl(0,0%,95.69%);">
      <span class="mb-4 text-muted rtyu">{{ $card->title }}</span>
      <p class="mb-5">
        <span class="w-75">{{ $card->description }}</span>
      </p>
      <i class="text-primary fas fa-arrow-right"></i>
    </a>
  @endforeach

  </div> <!-- id="allNewCards" -->
</section>










<main>
  <nav class=" pe-5" id="nav-panel" style="font-size: 1rem;">
    <ul class="navbar-nav text-nowrap ms-2 mt-2">
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#recentWorks">Recent Works</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#exploreTech">Explore Tech</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#services">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#happyClients">Our Clients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#consult">Consulting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-start border-4 p-3" href="#contact">Contact</a>
      </li>
    </ul>
  </nav>

  <article class="border">
    <!-- <section id="index">
      <ul>
        <li><a href="#recentWorks">Recent Works</a></li>
        <li><a href="#exploreTech">Explore Tech</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#consult">Consulting</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </section> -->

    <section id="recentWorks" style="font-size: 1rem;">
      <h4>Recent Works</h4>
      <div class="honey">
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
      </div> <!-- #honey -->
    </section>


    <section id="exploreTech" style="font-size: 1rem;">
      <h4>Explore our technology</h4>
      <div id="techCards">
        @foreach($exploreTechs as $exploreTech)
        <div class="tCards" tabindex="0">
          <div class="tHead">
            <div class="tIcons">
              <i class="{{ $exploreTech->icon }}"></i>
            </div><!-- .tIcons -->
            <div class="tTexts">
              <span>{{ $exploreTech->title }}</span>
              <i class="fas fa-angle-down"></i>
              <i class="fas fa-angle-up"></i>
            </div><!-- .tTexts -->
          </div><!-- .tHead -->
          <div class="tContent">
            <div class="tcHead">
              <h3>{{ $exploreTech->title }}</h3>
            </div>
            @if ($exploreTech->links)
            @foreach ($exploreTech->links as $link)
            <div class="tcLinks">
              <a href="#">{{ $link['title'] }}</a>
              <span>{{ $link['text'] }}</span>
            </div>
            @endforeach
            @endif
          </div><!-- .tContent -->
        </div> <!-- .tCards -->
        @endforeach
      </div> <!-- #techCards -->
    </section>

    <section class="ps-5 pe-2 py-2" id="services" style="font-size: 1rem;">
      <h4 class="mb-3">Our Services</h4>
      <div id="allServices" class="row">
        @foreach($services as $service)
        <div class="box col-md-4 col-sm-6">
          <i class="{{ $service->icon }}"></i>
          <div>
            <h6>{{ $service->title }}</h6>
            <p>{{ $service->description }}</p>
          </div>
        </div>
        <!-- .box {{ $service->title }} -->
        @endforeach
      </div> <!-- allServices -->
    </section>


    <section id="happyClients" class="ps-5 pe-2 py-2" style="font-size: 1rem;">
      <h4>Our Clients</h4>
      <div id="allClientCards" class="">
        @foreach($ourClients as $ourClient)
        <div class="clientCards">
          <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}">
          <span>{{ $ourClient->span}}</span>
        </div>
        @endforeach
      </div>
    </section>

    @include('includes.overview')
    @include('includes.contact')
  </article>
</main>