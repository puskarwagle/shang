//console.log("this is script.js from public js");

//IBM cards tHead click tContent display none or flex
const tCards = document.querySelectorAll('.tCards');
tCards.forEach((tCard) => {
  const tHead = tCard.querySelector('.tHead');
  const tContent = tCard.querySelector('.tContent');

  tHead.addEventListener('click', () => {
    if (tContent.style.display === 'flex') {
      tContent.style.display = 'none';
    } else {
      tContent.style.display = 'flex';
    }
  });
});

// GE about next and back text and image change
let imgTexts = {
  "ge1.webp": {
    "text": "Working towards the excellence in ensuring the Digital Governance in Nepal.",
    "altText": "this is the first img"
  },
  "ge2.webp": {
    "text": "Working towards the excellence in ensuring",
    "altText": "this is the second img"
  },
  "ge3.webp": {
    "text": "Working towards the excellence in ensuring the Digital Governance in Nepal. This is the third image.",
    "altText": "this is the third img"
  },
  "ge4.webp": {
    "text": "This is the fourth image.",
    "altText": "this is the fourth img"
  }
};

let currentIndex = 0; // current index of the object
let keys = Object.keys(imgTexts); // array of object keys

let aboutText = document.querySelector('#about .aboutTexts p');
let aboutImg = document.querySelector('#about .aboutTexts img');

function updateTextAndImg(index) {
  let key = keys[index]; // get key from the array of object keys
  let value = imgTexts[key]; // get value from the object using the key
  
  aboutText.textContent = value.text; // update paragraph text
  aboutImg.src = "./images/" + key; // update image source
  aboutImg.alt = value.altText; // update image alt text
}

document.querySelector('#aLeft').addEventListener('click', function() {
  currentIndex = (currentIndex === 0) ? keys.length - 1 : currentIndex - 1;
  updateTextAndImg(currentIndex);
});

document.querySelector('#aRight').addEventListener('click', function() {
  currentIndex = (currentIndex === keys.length - 1) ? 0 : currentIndex + 1;
  updateTextAndImg(currentIndex);
});
// END GE about next and back text and image change END


// SectionI dissapears
const sectionI = document.querySelector('#index');
const sectionA = document.querySelector('#about');
const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting && entry.intersectionRatio >= 0.75) {
      sectionI.style.display = 'flex';
    } else {
      sectionI.style.display = 'none';
    }
  });
}, {threshold: 0.75});

observer.observe(sectionA);


// Click X to remove intern
const intern = document.querySelector('#intern');
const internSTR = document.querySelector('#intern strong');

  internSTR.addEventListener('click', () => {
    if (intern.style.display === 'block') {
      intern.style.display = 'none';
    } else {
      intern.style.display = 'block';
    }
  });

/*
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
























*/


