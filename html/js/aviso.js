let botoes = document.querySelectorAll(".botao-excluir");

botoes.forEach(botao =>{
    botao.addEventListener('click', ()=>{
        window.location.assign(`./delete_aviso.php?id=${botao.id}`);
    });
});