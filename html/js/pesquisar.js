function search() {
  let busca = document.getElementById('pesquisar').value
  busca = busca.toLowerCase();
  let cards = document.getElementsByClassName('cards-pesquisa');
    
  for (i = 0; i < cards.length; i++) { 
      if (!cards[i].innerHTML.toLowerCase().includes(busca)) {
          cards[i].style.display="none";
      }
      else {
          cards[i].style.display="flex";                 
      }
  }
}

function filtro_aviso() {
    let filtro = document.getElementById('select_filtro').value
    let importancia;
    if (filtro == "Crítico"){
      importancia = 'background-color: #cc0000';
    } else if (filtro == "Urgente"){
      importancia = 'background-color: #f7d74a';
    } else if (filtro == "Importante"){
      importancia = 'background-color: #90ee90';
    } else {
      importancia = '';
    }
    
    let avisos = document.getElementsByClassName('cards-pesquisa');

    for (i = 0; i < avisos.length; i++) { 
        if (!avisos[i].innerHTML.toLowerCase().includes(importancia)) {
            avisos[i].style.display="none";
        }
        else {
            avisos[i].style.display="flex";                 
        }
    }
  }

  function filtro_anuncio() {
    let filtro = document.getElementById('select_filtro').value
    let tag;
    if (filtro == "Alimentação"){
      tag = 'background-color: #ff6da7'; // alimentação
    } else if (filtro == "Vestuário"){
      tag = 'background-color: #ff6d6d'; // vestuario
    } else if (filtro == "Eletrônicos"){
      tag = 'background-color: #76e3ce'; // eletronicos
    } else if (filtro == "Beleza"){
      tag = 'background-color: #66b73e'; // beleza
    } else if (filtro == "Decoração"){
      tag = 'background-color: #e6a545'; // decoração
    } else if (filtro == "Petshop"){
      tag = 'background-color: #9f35cc'; // pet-shop
    } else if (filtro == "Serviços"){
      tag = 'background-color: #86afea'; // serviços
    } else {
      tag = '';
    }
    
    let anuncios = document.getElementsByClassName('cards-pesquisa');

    for (i = 0; i < anuncios.length; i++) { 
        if (!anuncios[i].innerHTML.toLowerCase().includes(tag)) {
            anuncios[i].style.display="none";
        }
        else {
            anuncios[i].style.display="flex";                 
        }
    }
  }

