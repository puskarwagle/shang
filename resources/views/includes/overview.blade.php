<style>
  #consult ul li {
    padding:0 2rem 1rem 2rem;
    cursor: pointer;
  }
  #consult ul li:focus {
    border:2px solid cornflowerblue;
  }
  #consult ul li:hover {
    box-shadow: inset 0px -2px 0px 0px cornflowerblue;
  }
  .inConsultText a:hover {
    text-decoration: underline !important;
  }
</style>

<section id="consult" class="ps-5 pe-2 py-2" style="font-size: 1rem;">
  <h4 class="conH mb-3">Overview</h4>
  <ul id="consult-list" class="mb-3 pe-5 d-flex list-unstyled"></ul>
  <div class="inConsult d-flex">
    <img class="col-md-6 img-fluid" src="" alt="">
    <div class="col-md-6 inConsultText d-flex flex-column pt-4 px-5">
      <h3 class="mb-4"></h3>
      <span class="mb-4"></span>
      <a class="text-nowrap pe-1 text-decoration-none" href=""></a>
    </div>
  </div>
</section>


<script>
let coSpanText = document.querySelector('.inConsultText h3');
let coSpanText2 = document.querySelector('.inConsultText span:nth-child(2)');
let coAText = document.querySelector('.inConsultText a');
let coImg = document.querySelector('#consult .inConsult img');

function updateTeAndIm(value) {
  coSpanText.textContent = value.link;
  coSpanText2.textContent = value.text1;
  coAText.textContent = value.text3;
  coAText.href = value.text2;
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
listItems.forEach(item => {
  item.classList.add('flex-fill');
});
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
