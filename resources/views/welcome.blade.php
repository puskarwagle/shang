<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shangrila</title>
  <meta name="description" content="This here is the html of the landing page of Shangrila Microsystems nepal." />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <!-- Font-Awesome 5.15.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/ibm.css') }}">
  <!-- slider css for happy clients -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <!-- Slider js for happy clients -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
  </script>
</head>

<body>
  <header>
    <img src="./images/newSH.png" alt="shangrila logo">
    <ul class="navLarge">
      <li><a class="active" href="#">About</a></li>
      <li><a href="">Products <i class="fas fa-chevron-down fa-xs"></i></a></li>
      <li><a href="">Services <i class="fas fa-chevron-down fa-xs"></i></a></li>
      <li><a href="">Projects <i class="fas fa-chevron-down fa-xs"></i></a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <ul class="navSmall">
      <div id="navHam">
        <svg id="ham" viewBox="0 0 100 100" width="2vw">
          <rect x="10" y="25" width="80" height="10" />
          <rect x="10" y="45" width="80" height="10" />
          <rect x="10" y="65" width="80" height="10" />
          <rect x="10" y="85" width="80" height="10" />
        </svg>
        <svg id="hamClose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2vw">
          <line x1="18" y1="6" x2="6" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          <line x1="6" y1="6" x2="18" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        </svg>
      </div>
      <div id="navLists">
        <li><a class="active" href="#l"><span>About</span></a></li>
        <li><a href=""><span>Products</span><i class="fas fa-angle-right"></i></a></li>
        <li><a href=""><span>Services</span><i class="fas fa-angle-right"></i></a></li>
        <li><a href=""><span>Projects</span><i class="fas fa-angle-right"></i></a></li>
        <li><a href="#contact"><span>Contact</span></a></li>
      </div>
    </ul>
    <!-- 
    <div class="search_user">
      <i class="fas fa-search"></i>
      <i class="far fa-user"></i>
      <input type="checkbox" id="checkbox">
    </div> -->

    <div class="headerMain">
      <ul class="hMA">
        <li>Automation</li>
        <li>Data storage</li>
        <li>Websites</li>
        <li>Mobile applications</li>
        <li>Dot Net</li>
        <li>Features</li>
      </ul> <!-- .hMA -->
      <div class="hMB">
        <div class="hMBFirst">
          <span>Automation <i class="fas fa-arrow-right"></i></span>
          <span>Discipline is choosing between what you want now and what you want most.</span>
        </div>
        <div class="hMBTexts">
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
          <div class="hMBText">
            <span>Automation</span>
            <span>Discipline is choosing between what you want now and what you want most.</span>
          </div>
        </div> <!-- .hMBTexts -->
      </div> <!-- .hMB -->
    </div> <!-- .headerMain -->
  </header>

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
        <span>Get to know Shangrila</span>
        <i class="fas fa-arrow-right"></i>
        <i class="fas fa-external-link-alt"></i>
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

      <section id="consult">
        <h2>Overview</h2>
        <ul>
          <li>Innovation</li>
          <li>Support</li>
          <li>Development</li>
          <li>Opportunities</li>
          <li>Accounts</li>
        </ul>
        <div class="inConsult">
          <img src="./images/co1.jpg" alt="this is the partnership image">
          <div class="inConsultText">
            <span>Power of partnership</span>
            <span>Collaborate with the world’s leading platform and infrastructure leaders.</span>
            <a href="#">Unlock new Opportunities →</a>
          </div>
        </div>
      </section>

      <section id="contact">
        <h2>Contact us</h2>
        <div id="cMapForm">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.104023293115!2d85.33724784851069!3d27.701041176144106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a383b0d657%3A0xc015b104b0451efa!2sShangrila%20Microsystem!5e0!3m2!1sen!2snp!4v1679909937538!5m2!1sen!2snp&z=10"
            style="border:0;" allowfullscreen="false" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div id="cDetails">
            <h1>Shangrila Microsystem</h1>
            <span class="spanA">Call Us</span>
            <span class="spanB">+977 - 01 – 4102850, 4102852</span>
            <span class="spanA">Address</span>
            <span class="spanB">Maitidevi, Kathmandu, Nepal</span>
            <span class="spanA">Email us</span>
            <span class="spanB">info@shangrilagroup.com.np</span>
          </div>
        </div>
      </section>
    </article>
  </main>

  <footer>
    <div id="footerF">
      <img src="./images/newSH.png" alt="shangrila logo">
      <p>
        <span>United Kingdom - English</span>
        <i class="fas fa-globe"></i>
      </p>
    </div>

    <div id="footerULs">
      <ul> Products & Solutions
        <li><a href="#">Top products & platforms</a></li>
        <li><a href="#">Industries</a></li>
        <li><a href="#">Artificial intelligence</a></li>
        <li><a href="#">Blockchain</a></li>
        <li><a href="#">Business operations</a></li>
        <li><a href="#">Cloud computing</a></li>
        <li><a href="#">Data & Analytics</a></li>
        <li><a href="#">Financing</a></li>
      </ul>
      <ul> Popular links
        <li><a href="#">Supply chain</a></li>
        <li><a href="#">Security</a></li>
        <li><a href="#">IT infrastructure</a></li>
        <li><a href="#">Hybrid cloud</a></li>
        <li><a href="#">Developer education</a></li>
        <li><a href="#">IBM Research</a></li>
        <li><a href="#">Career opportunities</a></li>
        <li><a href="#">Upcoming events & webinars</a></li>
      </ul>
    </div>

    <div id="iconsRights">
      <span>© Copyright 2021 - Shangrila Microsystem. <br> All Rights Reserved.</span>
      <div id="icons">
        <a class="circle fac" href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="circle twi" href="#">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="circle lin" href="#">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>
  </footer>

  <script src="/js/script.js"></script>

  <!--
    // This js to toggle light and dark mode 
  <script>
    const checkbox = document.getElementById('checkbox');

    checkbox.addEventListener('change', (event) => {
      const link = document.getElementById('css-link');
      if (event.target.checked) {
        link.href = '/css/ibmD.css';
      } else {
        link.href = '/css/ibm.css';
      }
    });
  </script>
  -->

</body>

</html>