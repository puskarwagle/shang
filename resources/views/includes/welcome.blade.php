<section id="intern">
  <span>
    <a href="">Register now: You're invited to the Shangrila Internship event, 9–11 May, Ghattekulo, Kathmandu
      →</a>
  </span>
  <strong>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1vw">
      <line x1="18" y1="6" x2="6" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
      <line x1="6" y1="6" x2="18" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
    </svg>
  </strong>
</section>

<section id="about">
  <div class="aboutTexts">
    <p>Working towards the excellence in ensuring the Digital Governance in Nepal.</p>
    <span>See how the local government are automated using software like DOT NET to deliver services more
      efficiently. This is the third line. This is a good line.</span>
    <button>
      <a style="color:white;text-decoration:none;" href="{{ route('about') }}">
        <span>Get to know Shangrila</span>
        <i class="fas fa-arrow-right"></i>
        <i class="fas fa-external-link-alt"></i>
      </a>
    </button>
  </div>
  <img src="./images/shangrila-bg.jpg" alt="this is the first img">
  <!-- <div id="aLeft"><i  class="fas fa-angle-left"></i></div>
      <div id="aRight"><i  class="fas fa-angle-right"></i></div> -->
</section>

<section id="four">
  <h2>What’s new inside Shangrila</h2>
  <div id="allNewCards">
    <div class="fourCards">
      <bdo>Developer</bdo>
      <p>Read about shangria and its influence over IT in nepal.</p>
      <i class="fas fa-arrow-right"></i>
    </div>
    <div class="fourCards">
      <bdo>Support</bdo>
      <p>Learn about the services provided by this beautiful company.</p>
      <i class="fas fa-arrow-right"></i>
    </div>
    <div class="fourCards">
      <bdo>Products</bdo>
      <p>Take a look at the projects we have been working on.</p>
      <i class="fas fa-arrow-right"></i>
    </div>
    <div class="fourCards">
      <bdo>Internship</bdo>
      <p>Contact us. Preety self explainatory</p>
      <i class="fas fa-arrow-right"></i>
    </div>
  </div> <!-- id="allNewCards" -->
</section>

<main>
  <div class="nav-panel">
    <ul>
      <li><a href="#recentWorks">Recent Works</a></li>
      <li><a href="#exploreTech">Explore Tech</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#happyClients">Our Clients</a></li>
      <li><a href="#consult">Consulting</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div>

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
            <div class="tcLinks">
              @foreach ($exploreTech->links as $link)
              <a href="#">{{ $link['title'] }}</a>
              <span>{{ $link['text'] }}</span>
              @endforeach
            </div>
            @endif
          </div><!-- .tContent -->
        </div> <!-- .tCards -->
        @endforeach
      </div> <!-- #techCards -->
    </section>

    <section id="services">
      <h2>Our Services</h2>
      <div id="allServices">
        @foreach($services as $service)
        <div class="box">
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
      <div id="allClientCards">
        <div class="clientCards">
          <img src="./images/client1.png" alt="Nepal Government">
          <span>Nepal Government</span>
        </div>
        <div class="clientCards">
          <img src="./images/client2.png" alt="Nepal Police">
          <span>Nepal Police</span>
        </div>
        <div class="clientCards">
          <img src="./images/client3.jpg" alt="Nagrik Lagani Kosh">
          <span>Nagrik Lagani Kosh</span>
        </div>
        <div class="clientCards">
          <img src="./images/client4.png" alt="World Health Organization">
          <span>WHO</span>
        </div>
        <div class="clientCards">
          <img src="./images/client5.png" alt="Home Ministry">
          <span>Home Ministry</span>
        </div>
      </div> <!-- id="allClientCards" -->
    </section>
    
    @include('includes.overview')
    @include('includes.contact')
  </article>
</main>