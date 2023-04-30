//console.log("this is script.js from public js");

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


// left side navgation panel
const headerho = document.querySelector('header');
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-panel a');

window.addEventListener('scroll', () => {
  let currentSection = '';

  sections.forEach(section => {
    const headerHeight = headerho.clientHeight;
    const sectionTop = section.offsetTop + headerHeight;
    const sectionHeight = section.clientHeight;
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
    const sectionTop = section.offsetTop;
    window.scrollTo({
      top: sectionTop,
      behavior: 'smooth'
    });
  });
});
// left side navgation panel

/*
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
      i3.style.display = 'inine-block !important';
      iSpan.style.display = 'inline-block !imporatant';
    } else {
      tContent.style.display = 'flex';
      tContent.style.zIndex = '2';
      tCard.classList.add('focus-within');
      i2.style.display = 'none';
      iSpan.style.display = 'none';
    }
  });
});
*/ 
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

// Click on nav a to flex the .headerMain
const navL = document.querySelectorAll('.nav li a:has(i)');
const headerMain = document.querySelector('.headerMain');

navL.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    headerho.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    headerMain.style.display = (headerMain.style.display === 'flex') ? 'none' : 'flex';
  });
});
// Hide headerMain when user clicks elsewhere
window.addEventListener('click', (event) => {
  if (!event.target.closest('.nav') && !event.target.closest('.headerMain')) {
    headerMain.style.display = 'none';
  }
});


/*
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
*/

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

let listItems = document.querySelectorAll('#consult ul li');
for (let i = 0; i < listItems.length; i++) {
  listItems[i].addEventListener('click', function() {
    updateTeAndIm(i);
  });
}


// SectionI dissapears
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





























