
//alert("hii");
//console.log("hiii");



// boxes of achievements animate on intersection 
const boxes = document.querySelectorAll('.box');
const options = {
  root: null,
  rootMargin: '0px',
  threshold: 0.5
};
const observer = new IntersectionObserver(function(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.transform = 'translateX(0%)';
	  entry.target.style.opacity = '1';
	  observer.unobserve(entry.target);
    } 
	else {
      entry.target.style.transform = 'translateX(50%)';
      entry.target.style.opacity = '0';
	 }
  });
}, options);
boxes.forEach(box => {
  observer.observe(box, { once: true });
});
// happy clients intersection observer
const boxes2 = document.querySelectorAll('#happy');
const options2 = {
  root: null,
  rootMargin: '0px',
  threshold: 0.5
};
const observer2 = new IntersectionObserver(function(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.transform = 'translateY(0%)';
	  entry.target.style.opacity = '1';
	  observer.unobserve(entry.target);
    } 
	else {
      entry.target.style.transform = 'translateY(50%)';
      entry.target.style.opacity = '0';
	 }
  });
}, options2);

boxes2.forEach(box => {
  observer2.observe(box, { once: true });
});

// header animation and text blacked
const header = document.getElementById('header');
const aElheadnav = document.querySelectorAll('#mainmenu ul li a');
window.addEventListener('scroll', function() {
  if (window.scrollY > 0) {
    header.classList.add('scrolled');
    aElheadnav.forEach(function(a) {
      a.style.color = 'black';
    });
  } else {
    header.classList.remove('scrolled');
    aElheadnav.forEach(function(a) {
      a.style.color = 'white';
    });
  }
});

// offseet header
const headerHeight = document.getElementById('header').offsetHeight;
const links = document.querySelectorAll('#mainmenu a');

links.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const href = this.getAttribute('href');
    const target = document.querySelector(href);
    const offsetTop = target.offsetTop - headerHeight;
    window.scrollTo({
      top: offsetTop,
      behavior: 'smooth'
    });
  });
});


// Header menuLinks a 
const mainMenu = document.getElementById('mainmenu');
const menuLinks = mainMenu.querySelectorAll('a');
const pageSections = document.querySelectorAll('section');
const observerOptions = {
  rootMargin: '8vw',
  threshold: 0.5
};
const sectionObserver = new IntersectionObserver(function(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const sectionId = entry.target.getAttribute('id');
      menuLinks.forEach(link => {
        if (link.getAttribute('href') === `#${sectionId}`) {
          link.style.color = 'blue !important';
        } else {
          link.style.color = '';
        }
      });
    }
  });
}, observerOptions);
pageSections.forEach(section => {
  sectionObserver.observe(section);
});




// happy clients loop
const happy = document.getElementById('div');
happy.addEventListener('scroll', function() {
  if (happy.scrollLeft + happy.clientWidth >= happy.scrollWidth) {
    happy.appendChild(happy.firstElementChild);
    happy.scrollLeft -= happy.firstElementChild.clientWidth;
  }
});



























