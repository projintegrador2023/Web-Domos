function estrela() {
    const privacidade = document.getElementById('estrela');
    
    // Inicialize o estado como "vazia" se não estiver definido
    if (!privacidade.getAttribute('estado')) {
      privacidade.setAttribute('estado', 'vazia');
    }
  
    privacidade.addEventListener('click', () => {
      if (privacidade.getAttribute('estado') === 'vazia') {
        privacidade.setAttribute('estado', 'cheia');
        privacidade.innerHTML = `
          <i class="fa-solid fa-star p-1"></i>
        `;
      } else {
        privacidade.setAttribute('estado', 'vazia');
        privacidade.innerHTML = `
          <i class="fa-regular fa-star p-1"></i>
        `;
      }
    });
  }