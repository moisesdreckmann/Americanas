window.onload = function () {
    var passwords = document.querySelectorAll('.inputEyePass')

    passwords.forEach(password => {
        password.addEventListener('keypress', validaNum)
    });
}

var formCadastro = document.getElementById('formCadastro')
formCadastro.addEventListener('submit', validacao)

function validacao(event) {
    var inputs = document.querySelectorAll('.formLogin__input')
    var passwords = document.querySelectorAll('.inputEyePass')
    var message = document.querySelector('.spanMSG2')

    passwords.forEach(password => {
        if(password.value == '') {
            event.preventDefault()
            password.parentNode.style.border = "1px solid rgb(245, 16, 51)"
            message.innerHTML = "preencha todos os campos"
        } else {
            password.parentNode.style.border = "1px solid black"
            message.innerHTML = ''
        }
    })

    inputs.forEach(input => {
        if(input.value == '') {
            event.preventDefault()
            input.style.border = "1px solid rgb(245, 16, 51)"
            message.innerHTML = "preencha todos os campos"
        } else {
            input.style.border = "1px solid black"        
        }
    })

    if(passwords[0].value != passwords[1].value) {
        event.preventDefault()
        message.innerHTML = "as senhas devem ser iguais"
    } 
}

function validaNum(event) {
    if(event.keyCode < 48 || event.keyCode > 57){
        event.preventDefault() 
    }
}