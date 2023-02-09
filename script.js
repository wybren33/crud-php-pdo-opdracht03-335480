const slider = document.querySelector('input[type="range"]');
const output = document.querySelector('#valueDisplay');

slider.addEventListener('input', function() {
  output.innerHTML = slider.value;
});

