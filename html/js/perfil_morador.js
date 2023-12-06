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

document.addEventListener('DOMContentLoaded', function() {
  const editarButtons = document.querySelectorAll('.botao-editar-anuncio');
  const idAnuncioInput = document.querySelector('#idAnuncio');
  const tituloAnuncioInput = document.querySelector('#titulo_ANUNCIO');
  const descricaoAnuncioInput = document.querySelector('#descricao_ANUNCIO');
  const selectTag = document.querySelector("#id_select_tag");
  
  editarButtons.forEach(button => {
    button.addEventListener('click', function() {
      const anuncioId = this.getAttribute('data-anuncio-id');
      const anuncioTitulo = this.getAttribute('data-anuncio-titulo');
      const anuncioDescricao = this.getAttribute('data-anuncio-descricao');
      const anuncioTag = this.getAttribute('data-anuncio-tag');
      
      idAnuncioInput.value = anuncioId;
      tituloAnuncioInput.value = anuncioTitulo;
      descricaoAnuncioInput.value = anuncioDescricao;
      selectTag.value = anuncioTag;
    });
  });
});



