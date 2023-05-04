const cep = document.getElementById('cep')
cep.addEventListener('keypress', validaNum)
cep.addEventListener('keypress', mascaraCep)
cep.addEventListener('blur', listaEndereco)

function validaNum(event) {
    if(event.keyCode < 48 || event.keyCode > 57){
        event.preventDefault() 
    }
}

function mascaraCep(event) {
    if(this.value.length == 5) {
        this.value = this.value+'-'
    }
}

function listaEndereco(event) {
    const ajax = new XMLHttpRequest()
    ajax.addEventListener("load", readyAjax)
    ajax.open("GET", 'http://viacep.com.br/ws/'+this.value+'/json/')
    ajax.send()
}
function readyAjax(event) {
    if (this.status == 200 && this.readyState == 4) {
        var dados = JSON.parse(this.responseText)
        if (dados) {
            var item = document.querySelectorAll('.validaCep')
            item[0].value = dados.logradouro
            item[1].value = dados.bairro
            item[2].value = dados.localidade
        } else {
            console.log('Erro:', this.status);
        }
    }
}


