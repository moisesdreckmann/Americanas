function buscar(event) {
    var buscar = document.querySelector('.buscador').value
    const ajax = new XMLHttpRequest()
    ajax.addEventListener('load', ready)
    ajax.open('GET', 'pesquisa.php?p='+buscar)
    ajax.send()
}

function ready(event) {
    if(this.status == 200 && this.readyState == 4) {
        var carrega = document.getElementById("carrega")
        var conteudo = this.responseText
        carrega.innerHTML = ''       
        if(conteudo) {
            carrega.innerHTML = conteudo
        } else {
            if(this.status == 404) {
                console.log('Somthing wrong happen:',this.status)
            }       
        } 
    }
}

function loading(event) {
    event.preventDefault()
    var mensagem = document.querySelector(".spanMSG")
    var loadingDiv = document.querySelector(".c-loading")
    var formData = new FormData(event.target)
    var ajax = new XMLHttpRequest()
  
    ajax.onreadystatechange = function() {
      if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            var response = JSON.parse(ajax.responseText)
            mensagem.innerHTML = response.message
            loadingDiv.style.display = "none"
        } else {
            mensagem.innerHTML = response.message
            loadingDiv.style.display = "none"
        }
      } else {
            mensagem.innerHTML = ""
            loadingDiv.style.display = "block"
      }
    }
    
    ajax.open("POST", "includes/logica.php", true)
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest")
    ajax.send(formData)
}

function addCarrinho(event) {
    event.preventDefault()
    const ajax = new XMLHttpRequest()
    ajax.addEventListener('load', ready2)
    ajax.open('POST', event.target.action)
    var form = new FormData(event.target)
    ajax.send(form)
}

function ready2(event) {
    var quant = document.getElementById('carrega3')

    if(this.status == 200 && this.readyState == 4) {
        var conteudo = JSON.parse(this.responseText)
        quant.innerHTML = ''
        if(conteudo) {
            quant.innerHTML = conteudo
        } else {
            if(this.status == 404) {
                console.log('Somthing wrong happen:',this.status)
            }       
        } 
    }
}

function perguntas(event) {
    if( document.getElementById('comentario').value != '') {
        event.preventDefault()
        const ajax = new XMLHttpRequest()
        ajax.addEventListener('load', ready3)
        ajax.open("POST", event.target.action)
        const texto = new FormData(event.target)
        ajax.send(texto)
    } else {
        event.preventDefault()
    }
}

function ready3(event) {
    var texto = document.getElementById('carregaPerguntas')

    if(this.status == 200 && this.readyState == 4) {
        var conteudo = this.responseText
        texto.innerHTML = ''
        if(conteudo) {
            texto.innerHTML = conteudo
            document.getElementById('comentario').value = ''
        } else {
            if(this.status == 404) {
                console.log('Somthing wrong happen:',this.status)
            }       
        } 
    }
}


  
