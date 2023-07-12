const carouselContainer = document.querySelector('.carousel-container');
const carouselItems = document.querySelectorAll('.carousel-item');
const carouselLength = carouselItems.length;
const itemWidth = carouselItems[0].offsetWidth + 20; // Considere a margem
let currentPosition = 0;

function moveCarousel(direction) {
  if (direction === 'left') {
    currentPosition = (currentPosition - 1 + carouselLength) % carouselLength; // Calcula a nova posição para a esquerda
  } else if (direction === 'right') {
    currentPosition = (currentPosition + 1) % carouselLength; // Calcula a nova posição para a direita
  }

  // Ajusta a posição do carousel-container para criar o efeito circular
  if (currentPosition === 0 && direction === 'left') {
    carouselContainer.style.transform = `translateX(-${carouselLength * itemWidth}px)`;
    currentPosition = carouselLength;
  } else if (currentPosition === carouselLength - 1 && direction === 'right') {
    carouselContainer.style.transform = `translateX(0)`;
    currentPosition = -1;
  } else {
    carouselContainer.style.transform = `translateX(-${currentPosition * itemWidth}px)`;
  }

  updateOpacity();
}

// Restante do código permanece igual...


// Atualiza a opacidade dos itens do carrossel
function updateOpacity() {
  carouselItems.forEach((item, index) => {
    const itemPosition = (index - currentPosition + carouselLength) % carouselLength;
    const centerPosition = Math.floor(carouselLength / 2); // Posição central

    if (itemPosition === centerPosition) {
      item.classList.add('center');
    } else {
      item.classList.remove('center');
    }
  });
}

// Adiciona eventos aos botões de controle
const carouselControlButtons = document.querySelectorAll('.carousel-control-button');
carouselControlButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    const direction = this.dataset.direction;
    moveCarousel(direction);
  });
});

// Iniciar o movimento automático do carrossel
function autoMoveCarousel() {
  moveCarousel('right');
  setTimeout(autoMoveCarousel, 3000); // Troque o valor '3000' pelo tempo desejado em milissegundos
}

// Iniciar o movimento automático do carrossel
autoMoveCarousel();
