function estrela(){
    const privacidade = document.getElementById('estrela');
    privacidade.setAttribute('estado', 'vazia')
    privacidade.addEventListener('click', () => {
        if(privacidade.getAttribute('estado') === 'vazia'){
            privacidade.setAttribute('estado', 'cheia')
            privacidade.innerHTML = `
            <i class="fa-solid fa-star cor-estrela p-1">
            `
        }
        
        else{
            privacidade.setAttribute('estado', 'cheia')
            privacidade.innerHTML = `
            <i class="fa-regular fa-star cor-estrela p-1"></i>
            `
        }
    })
}