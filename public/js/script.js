document.addEventListener("DOMContentLoaded", function() {


//console.log("this is script.js from public/js/script.js");
// alert('hi');

// Small screen ham nav menu
const ham = document.querySelector('#ham');
const hamClose = document.querySelector('#hamClose');
const navLists = document.querySelector('#navLists');
ham.addEventListener('click', function() {
  ham.style.display = 'none';
  hamClose.style.display = 'flex';
  navLists.style.left = '0';
});
hamClose.addEventListener('click', function() {
  ham.style.display = 'block';
  hamClose.style.display = 'none';
  navLists.style.left = '-100%';
});
window.addEventListener('click', (event) => {
  if (!event.target.closest('#navLists') && !event.target.closest('#ham')) {
    navLists.style.left = '-100%';
    hamClose.style.display = 'none';
    ham.style.display = 'block';
  }
});

// add class sticky to header 
window.addEventListener('scroll', function() {
  const header = document.querySelector('header');
  const scrollPosition = window.scrollY;

  if (scrollPosition > 0) {
    header.classList.add('sticky');
  } else {
    header.classList.remove('sticky');
  }
});




// Click X to remove intern
// const intern = document.querySelector('#intern');
// const internS = document.querySelector('#intern strong');

// if (internS) {
//   internS.addEventListener('click', () => {
//     if (intern.style.display === 'block') {
//       intern.style.display = 'none';
//     } else {
//       intern.style.display = 'block';
//     }
//   });
// };


// left side navgation panel
const headerho = document.querySelector('header');
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('#nav-panel a');

window.addEventListener('scroll', () => {
  let currentSection = '';
  sections.forEach(section => {
    const sectionHeight = section.clientHeight;
    const headerHeight = headerho.clientHeight;
    const sectionTop = section.offsetTop - headerHeight;
    if (pageYOffset >= sectionTop - sectionHeight) {
      currentSection = section.getAttribute('id');
    }
  });
  navLinks.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href').substring(1) === currentSection) {
      link.classList.add('active');
    }
  });
});
navLinks.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const section = document.querySelector(link.getAttribute('href'));
    const headerHeight = headerho.clientHeight;
    const sectionTop = section.offsetTop - headerHeight;
    window.scrollTo({
      top: sectionTop,
      behavior: 'smooth'
    });
  });
});
// left side navgation panel

// small devices index
  const indexSection = document.querySelector('#index');
  let prevScrollPos = window.pageYOffset;
  const indexLinks = document.querySelectorAll('#index a');

  document.addEventListener('DOMContentLoaded', () => {
    window.addEventListener('scroll', () => {
      if (window.innerWidth < 900) {
        const currentScrollPos = window.pageYOffset;
        if (prevScrollPos > currentScrollPos) {
          indexSection.style.display = 'none';
        } else {
          indexSection.style.display = 'block';
        }
        prevScrollPos = currentScrollPos;
      } else {
        indexSection.style.display = 'none';
      }
    });
    indexLinks.forEach(linkIn => {
      linkIn.addEventListener('click', e => {
        e.preventDefault();
        const section = document.querySelector(linkIn.getAttribute('href'));
        const headerHeight = headerho.clientHeight;
        const sectionTop = section.getBoundingClientRect().top + window.pageYOffset - headerHeight;
        window.scrollTo({
          top: sectionTop,
          behavior: 'smooth'
        });
      });
    });    
  });
// small devices index

// ExploreTech IBM cards tHead click tContent display none or flex
const tCards = document.querySelectorAll('.tCards');

document.body.addEventListener('click', (event) => {
  tCards.forEach((tCard) => {
    const tHead = tCard.querySelector('.tHead');
    const tContent = tCard.querySelector('.tContent');
    const i1 = tHead.querySelector('.tIcons i');
    const i2 = tHead.querySelector('.tTexts i:nth-child(2)');
    const i3 = tHead.querySelector('.tTexts i:nth-child(3)');
    const iSpan = tHead.querySelector('.tTexts span');

    if (!tCard.contains(event.target)) {
      tContent.style.display = 'none';
      tCard.classList.remove('focus-within');
      i1.style.transform = 'scale(1)';
      iSpan.style.display = 'inline-flex';
      i2.style.display = 'inline-flex';
      i3.style.display = 'none';
    }
  });
});

tCards.forEach((tCard) => {
  const tHead = tCard.querySelector('.tHead');
  const tContent = tCard.querySelector('.tContent');
  const i1 = tHead.querySelector('.tIcons i');
  const i2 = tHead.querySelector('.tTexts i:nth-child(2)');
  const i3 = tHead.querySelector('.tTexts i:nth-child(3)');
  const iSpan = tHead.querySelector('.tTexts span');

  tHead.addEventListener('click', () => {
    if (tCard.classList.contains('focus-within')) {
      tContent.style.display = 'none';
      tCard.classList.remove('focus-within');
      i1.style.transform = 'scale(1)';
      iSpan.style.display = 'inline-flex';
      i2.style.display = 'inline-flex';
      i3.style.display = 'none';
    } else {
      tContent.style.display = 'flex';
      tCard.classList.add('focus-within');
      i1.style.transform = 'scale(1.5)';
      iSpan.style.display = 'none';
      i2.style.display = 'none';
      i3.style.display = 'inline-flex';
    }
  });
});


// Happy clients javascript
  $(document).ready(function(){
    $('#allClientCards').slick({
      dots: true, // Show pagination dots
      infinite: true, // Enable infinite loop
      speed: 500, // Animation speed in milliseconds
      autoplay: true,
      slidesToShow: 4, // Show 3 slides at a time
      slidesToScroll: 1, // Scroll 1 slide at a time
      responsive: [
        {
          breakpoint: 768, // Breakpoint for devices with screen width less than 768px
          settings: {
            slidesToShow: 2 // Show 2 slides at a time
          }
        },
        {
          breakpoint: 480, // Breakpoint for devices with screen width less than 480px
          settings: {
            slidesToShow: 1 // Show 1 slide at a time
          }
        }
      ]
    });
  });


// SectionIndex on scroll dissapears
// const sectionI = document.querySelector('#index');
// const sectionA = document.querySelector('#about');
// const observerA = new IntersectionObserver((entries, observer) => {
//   entries.forEach(entry => {
//     if (entry.isIntersecting && entry.intersectionRatio >= 0.75) {
//       sectionI.style.display = 'flex';
//     } else {
//       sectionI.style.display = 'none';
//     }
//   });
// }, {threshold: 0.75});

// observer.observe(sectionA);

// services of achievements animate on intersection 
const services = document.querySelectorAll('.box');
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
services.forEach(box => {
  observer.observe(box, { once: true });
});




  // End of document.addEventListener("DOMContentLoaded", function(event) 
  // ...
});
