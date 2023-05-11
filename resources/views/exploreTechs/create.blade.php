
<form class="cmsForm" method="POST" action="{{ route('exploreTechs.store') }}">
    @csrf
    <div>
      <label for="icon">icon:</label>
      <input type="text" id="icon" name="icon" required>
    </div>
    
    <div>
      <label for="title">title:</label>
      <input type="text" id="title" name="title" required>
    </div>
    
    <div id="links-container" style="display:flex;flex-direction:column;gap:1vw;">
      <div class="link-inputs" style="display:flex;justify-content:center;border:2px solid white;width:max-content;">
        <label for="linkTitles">Link Title:</label>
        <input type="text" name="linkTitles[]" required>
        <label for="linkTexts">Link Texts:</label>
        <input type="text" name="linkTexts[]" required>
      </div>
      <button id="add-link" type="button">Add link</button>
    </div>
    <button onclick="return confirm('Are you sure you want to submit this form?')" type="submit">Add exploreTech</button>
</form>

<script>
  const addLinkBtn = document.getElementById('add-link');
  const linksContainer = document.getElementById('links-container');

  addLinkBtn.addEventListener('click', () => {
    const linkInputs = document.querySelector('.link-inputs');
    const newLinkInputs = linkInputs.cloneNode(true);
    linksContainer.insertBefore(newLinkInputs, addLinkBtn);
  });
</script>