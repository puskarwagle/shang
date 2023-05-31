
<form class="cmsForm" method="POST" action="{{ route('headerProducts.store') }}">
    @csrf
    <div>
      <label for="title">title:</label>
      <input type="text" id="title" name="title" required>
    </div>
    <div>
      <label for="title_text">title_text:</label>
      <input type="text" id="title_text" name="title_text" required>
    </div>
    
    <div class="clinks-container" style="display:flex;flex-direction:column;gap:1vw;">
      <div class="clink-inputs" style="display:flex;justify-content:center;border:2px solid white;width:max-content;">
        <label for="subTitles">Sub Title:</label>
        <input type="text" name="subTitles[]" required>
        <label for="subTexts">sub Texts:</label>
        <input type="text" name="subTexts[]" required>
      </div>
      <button class="cadd-link" type="button">Add more sub titles and texts</button>
    </div>

    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add headerProducts</button>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
  </form>

  <script>
  // add links to explore and subTitles to headerProducts and headerServices 
  const clinksContainers = document.querySelectorAll('.clinks-container');
  clinksContainers.forEach(clinksContainer => {
    const caddLinkBtn = clinksContainer.querySelector('.cadd-link');
    const clinkInputs = clinksContainer.querySelector('.clink-inputs');
    caddLinkBtn.addEventListener('click', () => {
      const cnewLinkInputs = clinkInputs.cloneNode(true);
      clinksContainer.insertBefore(cnewLinkInputs, caddLinkBtn);
    });
  });
</script>