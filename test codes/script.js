const toggleButton = document.getElementById('toggleButton');

toggleButton.addEventListener('click', function() {
  const body = document.body;
  body.classList.toggle('alternative');

  const isAlternative = body.classList.contains('alternative');

  if (isAlternative) {
    body.style.setProperty('--bg-color', '#f2f2f2');
    body.style.setProperty('--text-color', '#333333');
    body.style.setProperty('--header-color', '#007bff');
    body.style.setProperty('--button-bg-color', '#007bff');
    body.style.setProperty('--button-text-color', '#ffffff');
  } else {
    body.style.setProperty('--bg-color', '#ffffff');
    body.style.setProperty('--text-color', '#000000');
    body.style.setProperty('--header-color', '#ff0000');
    body.style.setProperty('--button-bg-color', '#ff0000');
    body.style.setProperty('--button-text-color', '#ffffff');
  }
});
