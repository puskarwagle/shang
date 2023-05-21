<section id="intern" class="bg-dark text-white py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h3>Register now: You're invited to the Shangrila Internship event, 9–11 May, Ghattekulo, Kathmandu</h3>
      </div>
      <div class="col-md-4 text-md-end">
        <a href="#" class="btn btn-outline-light">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16">
            <line x1="18" y1="6" x2="6" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <line x1="6" y1="6" x2="18" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</section><br>

<section id="about" class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <p class="lead">Working towards excellence in ensuring Digital Governance in Nepal.</p>
        <p>See how local governments are automated using software like DOT NET to deliver services more efficiently.
          This is the third line. This is a good line.</p>
        <a href="{{ route('about') }}" class="btn btn-primary">
          <span>Get to know Shangrila</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
      <div class="col-md-6">
        <img src="./images/shangrila-bg.jpg" alt="this is the first img" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<section id="fou" class="p-5">
  <h2 class="mb-4">What’s new inside Shangrila</h2>
  <div id="allNewCards" class="d-flex mx-5">

    <a href="{{ route('mission') }}" 
       class="bg-light mx-1 px-2 pt-3 w-25 card text-decoration-none hover:bg-dark">
      <h5 class="mb-4">Mission</h5>
      <p class="d-flex justify-content-between">
        <span>Read about shangria and its influence over IT in nepal. This is a filler line.</span>
        <i class="text-primary align-self-end fas fa-arrow-right"></i>
      </p>
    </a>

    <a href="{{ route('dataCenterServices') }}" 
       class="bg-light mx-1 px-2 pt-3 w-25 card text-decoration-none">
      <h5 class="mb-4">Support</h5>
      <p class="d-flex justify-content-between">
        <span class="w-75">Learn about the services provided by this beautiful company.</span>
        <i class="text-primary align-self-end fas fa-arrow-right"></i>
      </p>
    </a>

    <a href="{{ route('products') }}" class="bg-light mx-1 px-2 pt-3 w-25 card text-decoration-none">
      <h5 class="mb-4">Products</h5>
      <p class="d-flex justify-content-between">
        <span class="w-75">Take a look at the projects we have been working on.</span>
        <i class="text-primary align-self-end fas fa-arrow-right"></i>
      </p>
      
    </a>
    <a href="{{ route('internship') }}" class="bg-light mx-1 px-2 pt-3 w-25 card text-decoration-none">
      <h5 class="mb-4">Internship</h5>
      <p class="d-flex justify-content-between">
        <span class="w-75">Contact us. You ca get a internship here and you will get to learn.</span>
        <i class="text-primary align-self-end fas fa-arrow-right"></i>
      </p>
    </a>

  </div> <!-- id="allNewCards" -->
</section>

<main>
  <!-- <div class="nav-panel">
    <ul>
      <li><a href="#recentWorks">Recent Works</a></li>
      <li><a href="#exploreTech">Explore Tech</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#happyClients">Our Clients</a></li>
      <li><a href="#consult">Consulting</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div> -->

  <nav class="navbar nav-panel">
    <ul class="navbar-nav sticky-top text-nowrap mt-5 ms-3">
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
  
  <article>
    <section id="index">
      <ul>
        <li><a href="#recentWorks">Recent Works</a></li>
        <li><a href="#exploreTech">Explore Tech</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#consult">Consulting</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </section>

    <section id="recentWorks">
      <h2>Recent Works</h2>
      <div id="" class="d-flex border" >

        @foreach($recentWorks as $recentWork)
        <div class="card mw-auto mx-3">
          <img class="card-img-top" width="200px" src="{{ $recentWork->imgsrc }}" alt="{{ $recentWork->imgalt }}" />
          <div class="card-body d-flex flex-column text-nowrap">  
            <h4 class="card-title">{{ $recentWork->titleA }}</h4>
            <p class="card-text">{{ $recentWork->titleB }}</p>
          </div>
          <div class=".tect">{{ $recentWork->description }}</div>
        </div>
        @endforeach

      </div> <!-- #honey -->
    </section>


    <section id="exploreTech">
      <h2>Explore our technology</h2>
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

    <section id="services">
      <h2>Our Services gpt</h2>
      <div id="allServices" class="row">
        @foreach($services as $service)
        <div class="box col-md-4">
          <i class="{{ $service->icon }}"></i>
          <div>
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
          </div>
        </div>
        <!-- .box {{ $service->title }} -->
        @endforeach
      </div> <!-- allServices -->
    </section>


    <section id="happyClients">
      <h2>Our Clients</h2>
      <div id="allClientCards" class="d-flex flex-wrap">
        @foreach($ourClients as $ourClient)
        <div class="clientCards">
          <img src="./images/ourClients/{{ $ourClient->imgsrc }}" alt="{{ $ourClient->imgalt }}" class="img-fluid img-thumbnail">
          <span>{{ $ourClient->span}}</span>
        </div>
        @endforeach
      </div>
    </section>

    @include('includes.overview')
    @include('includes.contact')
  </article>
</main>