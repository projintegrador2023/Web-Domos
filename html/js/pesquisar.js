function search() {
  let input = document.getElementById('pesquisar').value
  input = input.toLowerCase();
  let aux = document.getElementsByClassName('cards-pesquisa');
    
  for (i = 0; i < aux.length; i++) { 
      if (!aux[i].innerHTML.toLowerCase().includes(input)) {
          aux[i].style.display="none";
      }
      else {
          aux[i].style.display="list-item";                 
      }
  }
}