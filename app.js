function abrir() {
    document.getElementsByName('popUp')[0].style.display = 'block';
    document.getElementsByName('botaoCriar')[0].style.display = 'none';
}

function fechar() {
    document.getElementsByName('popUp')[0].style.display = 'none';
    document.getElementsByName('botaoCriar')[0].style.display = 'block';
}

function validaUsuarioLogado() {
    let estaLogado=document.getElementById('logado').value;
    if (sessionStorage.getItem('valorStorage') !== null && estaLogado === '{LOGADO}') {
        document.getElementById('logado').value = sessionStorage.getItem('estaLogado');
    }
    if (sessionStorage.getItem('valorStorage') === null && estaLogado === '{LOGADO}'){
        window.location.href = 'index.html';
    } 
}
function logar(){
    sessionStorage.setItem('valorStorage', true);
}
