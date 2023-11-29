function search() {
  let filtro = document.getElementById('pesquisar').value
  filtro = filtro.toLowerCase();
  let avisos = document.getElementsByClassName('cards-pesquisa');
    
  for (i = 0; i < avisos.length; i++) { 
      if (!avisos[i].innerHTML.toLowerCase().includes(filtro)) {
          avisos[i].style.display="none";
      }
      else {
          avisos[i].style.display="list-item";                 
      }
  }
}

function filtro() {
    let filtro = document.getElementById('select_filtro').value
    let importancia;
    if (filtro == "Crítico"){
        importancia = 'background-color: #cc0000';
      } else if (filtro == "Urgente"){
        importancia = 'background-color: #F7D74A';
      } else if (filtro == "Importante"){
        importancia = 'background-color: #90ee90';
      }
    
    let avisos = document.getElementsByClassName('cards-pesquisa');

    for (i = 0; i < avisos.length; i++) { 
        if (!avisos[i].innerHTML.toLowerCase().includes(importancia)) {
            avisos[i].style.display="none";
        }
        else {
            avisos[i].style.display="list-item";                 
        }
    }
  }