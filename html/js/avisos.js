function salvos() {
  const privacidade = document.getElementById('salvo');
  
  // Inicialize o estado como "vazia" se não estiver definido
  if (!privacidade.getAttribute('estado')) {
    privacidade.setAttribute('estado', 'vazia');
  }

  privacidade.addEventListener('click', () => {
    if (privacidade.getAttribute('estado') === 'vazia') {
      privacidade.setAttribute('estado', 'cheia');
      privacidade.innerHTML = `
        <i class="fa-solid fa-bookmark color-0491a3"></i>
      `;
    } else {
      privacidade.setAttribute('estado', 'vazia');
      privacidade.innerHTML = `
        <i class="fa-regular fa-bookmark color-0491a3"></i>
      `;
    }
  });
}
