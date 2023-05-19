<section id="consult">
  <h2>Overview</h2>
  <ul id="consult-list"></ul>
  <div class="inConsult">
    <img src="" alt="">
    <div class="inConsultText">
      <span></span>
      <span></span>
      <a href=""></a>
    </div>
  </div>
</section>


<script>
let coSpanText = document.querySelector('.inConsultText span:nth-child(1)');
let coSpanText1 = document.querySelector('.inConsultText span:nth-child(2)');
let coAText = document.querySelector('.inConsultText a');
let coImg = document.querySelector('#consult .inConsult img');

function updateTeAndIm(value) {
  coSpanText.textContent = value.text1;
  coSpanText1.textContent = value.text2;
  coAText.textContent = value.text3;
  coAText.href = value.link;
  coImg.src = "./images/overview/" + value.imgsrc;
  coImg.alt = value.imgalt;
}

let ulElement = document.querySelector('#consult ul');
for (let i = 0; i < @json($overviews).length; i++) {
  let value = @json($overviews)[i];
  let liElement = document.createElement('li');
  liElement.textContent = value.titleLi;
  ulElement.appendChild(liElement);
}

let listItems = document.querySelectorAll('#consult ul li');
function setActiveListItem(i) {
  for (let j = 0; j < listItems.length; j++) {
    if (j === i) {
      listItems[j].style.boxShadow = "inset 0px -2px 0px 0px cornflowerblue";
    } else {
      listItems[j].style.boxShadow = "inset 0px -2px 0px 0px white";
    }
  }
}

updateTeAndIm(@json($overviews)[0]);
setActiveListItem(0);

for (let i = 0; i < listItems.length; i++) {
  listItems[i].addEventListener('click', function() {
    updateTeAndIm(@json($overviews)[i]);
    setActiveListItem(i);
  });
}
</script>
