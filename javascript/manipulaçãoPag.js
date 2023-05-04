const busca = document.querySelector('.buscador')
const buscador = document.querySelector('.containerBuscador')
busca.addEventListener("focus", destacarInput)

const loginText = document.querySelector('.divLogin')
loginText.addEventListener("mouseenter", destacarLogin)
loginText.addEventListener("mouseleave", mostrar)

const paginaEscura = document.querySelector('.fundoCinza')
paginaEscura.addEventListener("click", mostrar)

const menu = document.querySelector('.navigator')
menu.addEventListener('mouseenter', detacarMenu)
menu.addEventListener('mouseleave', mostrar2)
const submenus = document.querySelectorAll(".submenu")

const paginaEscura2 = document.querySelector('.fundoCinza2')
const header = document.querySelector('.header')

function destacarInput() {
    paginaEscura.style.opacity = "0.4"
    paginaEscura.style.zIndex = "10"
    buscador.style.zIndex = "20"
    loginText.style.zIndex = "0"
    menu.style.zIndex = "0"
    header.style.zIndex = "30"
    header.style.position = "static"
}

function destacarLogin() {
    paginaEscura.style.opacity = "0.4"
    paginaEscura.style.zIndex = "10"
    loginText.style.zIndex = "20"
    buscador.style.zIndex = "0"
    menu.style.zIndex = "0"
    header.style.zIndex = "30"
    header.style.position = "static"
}

function mostrar() {
    paginaEscura.style.zIndex = "-10"
    paginaEscura.style.opacity = "0"
}

function detacarMenu() {
    if(window.innerWidth > 600) {
        paginaEscura2.style.opacity = "0.4"
        paginaEscura2.style.zIndex = "10"
        menu.style.zIndex = "20"
        header.style.zIndex = "20"
        header.style.position = "relative"
        submenus.forEach(submenu => {
            submenu.style.zIndex = "20"
        });
    }
}

function mostrar2() {
    if(window.innerWidth > 600) {
        paginaEscura2.style.opacity = "0"
        paginaEscura2.style.zIndex = "-10"
        paginaEscura.style.opacity = "-10"
        menu.style.zIndex = "0"
        submenus.forEach(submenu => {
            submenu.style.zIndex = "0"
        });
    }
}


