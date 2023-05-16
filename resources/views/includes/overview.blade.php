<section id="consult">
  <h2>Overview</h2>
  <ul id="consult-list">
    
  </ul>
  <div class="inConsult">
    <img src="" alt="">
    <div class="inConsultText">
      <span></span>
      <span></span>
      <a href="#"></a>
    </div>
  </div>
</section>


<script>
// Consulting Section
let imgSpanTexts = {
  "co1.jpg": {
    "titleLi": "Innovation",
    "text": "Innovation Accelerate together",
    "text1": "Innovation to shoulder with experts to accelerate business transformation.",
    "text2AA": "the route or link for a tag element",
    "text2": "Innovation IBM Consulting services",
    "altText": "Innovation is the first img"
  },
  "co2.jpg": {
    "titleLi": "Strategy",
    "text": "Strategy what’s possible",
    "text1": "Strategy the untapped potential inside your business.",
    "text2AA": "the route or link for a tag element",
    "text2": "Strategy IBM Consulting services",
    "altText": "Strategy is the second img"
  },
  "co3.jpg": {
    "titleLi": "Technology",
    "text": "Technology towards the excel.",
    "text1": "Technology shoulder to shoulder with experts to accelerate business transformation.",
    "text2AA": "the route or link for a tag element",
    "text2": "Technology IBM Consulting services",
    "altText": "Technology is the third img"
  },
  "co4.jpg": {
    "titleLi": "Partners",
    "text": "Partners is the fourth image.",
    "text1": "Partners shoulder to shoulder with experts to accelerate business transformation.",
    "text2AA": "the route or link for a tag element",
    "text2": "Partners IBM Consulting services",
    "altText": "this is the fourth img"
  },
  "co5.jpg": {
    "titleLi": "Services",
    "text": "Services is the fifth image.",
    "text1": "Services shoulder to shoulder with experts to accelerate business transformation.",
    "text2AA": "the route or link for a tag element",
    "text2": "Services IBM Consulting services",
    "altText": "this is the fifth img"
  }
};

let coIndex = 0;
let coKeys = Object.keys(imgSpanTexts);
let coLiText = document.querySelector('#consult ul li');
let coSpanText = document.querySelector('.inConsultText span:nth-child(1)');
let coSpanText1 = document.querySelector('.inConsultText span:nth-child(2)');
let coAText = document.querySelector('.inConsultText a');
let coImg = document.querySelector('#consult .inConsult img');

function updateTeAndIm(index) {
  let key = coKeys[index];
  let value = imgSpanTexts[key];
  coSpanText.textContent = value.text;
  coSpanText1.textContent = value.text1;
  coAText.textContent = value.text2;
  coAText.href = value.text2AA;
  coImg.src = "./images/" + key;
  coImg.alt = value.altText;
}

//window.addEventListener('load', function() {
  let ulElement = document.querySelector('#consult ul');
  for (let key in imgSpanTexts) {
    let value = imgSpanTexts[key];
    let liElement = document.createElement('li');
    liElement.textContent = value.titleLi;
    ulElement.appendChild(liElement);
  }
//});

let listItems = document.querySelectorAll('#consult ul li');
console.log(listItems.textContent);
function setActiveListItem(index) {
  for (let i = 0; i < listItems.length; i++) {
    if (i === index) {
      listItems[i].style.boxShadow = "inset 0px -2px 0px 0px cornflowerblue";
    } else {
      listItems[i].style.boxShadow = "inset 0px -2px 0px 0px white";
    }
  }
}

updateTeAndIm(0);
setActiveListItem(0);
//window.addEventListener('load', function() {
  for (let i = 0; i < listItems.length; i++) {
    listItems[i].addEventListener('click', function() {
      console.log('hey');
      updateTeAndIm(i);
      setActiveListItem(i);
    });
  }
  
//});
</script>