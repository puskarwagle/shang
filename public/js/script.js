//console.log("this is script.js from public/js/script.js");

// sticky header 
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
const intern = document.querySelector('#intern');
const internS = document.querySelector('#intern strong');
//console.log(intern);
//console.log(internS);

  internS.addEventListener('click', () => {
    if (intern.style.display === 'block') {
      intern.style.display = 'none';
    } else {
      intern.style.display = 'block';
    }
  });

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

// left side navgation panel
const headerho = document.querySelector('header');
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-panel a');

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

//IBM cards tHead click tContent display none or flex
const tCards = document.querySelectorAll('.tCards');
const i2 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(2)');
const i3 = document.querySelector('#exploreTech .tCards .tHead .tTexts i:nth-child(3)');
const iSpan = document.querySelector('#exploreTech .tCards .tHead .tTexts span');

tCards.forEach((tCard) => {
  const tHead = tCard.querySelector('.tHead');
  const tContent = tCard.querySelector('.tContent');

  tHead.addEventListener('click', () => {
    if (tCard.classList.contains('focus-within')) {
      tContent.style.display = 'none';
      tCard.classList.remove('focus-within');
    } else {
      tContent.style.display = 'flex';
      tCard.classList.add('focus-within');
    }
  });
});

// Click on nav a to flex the .headerMain Large 
const navL = document.querySelectorAll('.navLarge li a:has(i)');
const headerMain = document.querySelector('.headerMain');
navL.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.display = (headerMain.style.display === 'flex') ? 'none' : 'flex';
  });
});
window.addEventListener('click', (event) => {
  if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest('.headerMain')) {
    headerMain.style.display = 'none';
  }
});
// Click on nav a to flex the .headerMain Large

// Click on nav a to flex the .headerMain Small 
const navS = document.querySelectorAll('#navLists li a:has(i)');
console.log(navS);

navS.forEach(linkSs => {
  linkSs.addEventListener('click', (event) => {
    event.preventDefault();
    headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.display = (headerMain.style.display === 'flex') ? 'none' : 'flex';
  });
});

window.addEventListener('click', (event) => {
  if (!event.target.closest('.navLarge') && !event.target.closest('#navLists') && !event.target.closest('.headerMain')) {
    headerMain.style.display = 'none';
  }
});
// Click on nav a to flex the .headerMain Small


// Consulting Section
let imgSpanTexts = {
  "co1.jpg": {
    "text": "Overview Accelerate together",
    "text1": "Overview to shoulder with experts to accelerate business transformation.",
    "text2": "Overview IBM Consulting services",
    "altText": "Overview is the first img"
  },
  "co2.jpg": {
    "text": "Strategy what’s possible",
    "text1": "Strategy the untapped potential inside your business.",
    "text2": "Strategy IBM Consulting services",
    "altText": "Strategy is the second img"
  },
  "co3.jpg": {
    "text": "Technology towards the excel This is the third image.",
    "text1": "Technology shoulder to shoulder with experts to accelerate business transformation.",
    "text2": "Technology IBM Consulting services",
    "altText": "Technology is the third img"
  },
  "co4.jpg": {
    "text": "Partners is the fourth image.",
    "text1": "Partners shoulder to shoulder with experts to accelerate business transformation.",
    "text2": "Partners IBM Consulting services",
    "altText": "this is the fourth img"
  },
  "co5.jpg": {
    "text": "Services is the fifth image.",
    "text1": "Services shoulder to shoulder with experts to accelerate business transformation.",
    "text2": "Services IBM Consulting services",
    "altText": "this is the fifth img"
  }
};

let coIndex = 0;
let coKeys = Object.keys(imgSpanTexts);
let coSpanText = document.querySelector('.inConsultText span:nth-child(1)');
let coSpanText1 = document.querySelector('.inConsultText span:nth-child(2)');
let coAText = document.querySelector('.inConsultText a');
let coImg = document.querySelector('#consult .inConsult img');
// console.log(coSpanText,coSpanText1,coAText,coImg);

function updateTeAndIm(index) {
  let key = coKeys[index];
  let value = imgSpanTexts[key];
  coSpanText.textContent = value.text;
  coSpanText1.textContent = value.text1;
  coAText.textContent = value.text2;
  coImg.src = "./images/" + key;
  coImg.alt = value.altText;
}
function setActiveListItem(index) {
  for (let i = 0; i < listItems.length; i++) {
    if (i === index) {
      listItems[i].style.boxShadow = "inset 0px -2px 0px 0px cornflowerblue";
    } else {
      listItems[i].style.boxShadow = "inset 0px -2px 0px 0px white";
    }
  }
}
let listItems = document.querySelectorAll('#consult ul li');
for (let i = 0; i < listItems.length; i++) {
  listItems[i].addEventListener('click', function() {
    // listItems[i].style.boxShadow = "inset 0px -2px 0px 0px cornflowerblue";
    updateTeAndIm(i);setActiveListItem(i);
  });
}
//consulting

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
const sectionI = document.querySelector('#index');
const sectionA = document.querySelector('#about');
const observerA = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting && entry.intersectionRatio >= 0.75) {
      sectionI.style.display = 'flex';
    } else {
      sectionI.style.display = 'none';
    }
  });
}, {threshold: 0.75});

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


