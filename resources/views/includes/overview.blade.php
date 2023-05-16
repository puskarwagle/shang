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
    "text": "Technology towards the excel This is the third image.",
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
      updateTeAndIm(i);
      setActiveListItem(i);
    });
  }
</script>