const menusli = document.querySelectorAll('.menuli')

menusli.forEach(menuli => {
    menuli.addEventListener('click', mostrarSubmenu)
});

function mostrarSubmenu(event) {
    const evento = event.target
    const submenu = evento.querySelector('.submenu')

    if (submenu) {
        if (submenu.style.transform === "scale(1)") {
            submenu.style.transform = "scale(0)"
            evento.style.color = "rgb(102, 103, 103)"
        } else {
            submenu.style.transform = "scale(1)"
            evento.style.color = "rgb(245, 16, 51)"
            evento.style.borderBottom = "1px solid rgba(0, 0, 0, 0.135)"
        }
        event.stopPropagation()
    }

    const subsAbertos = document.querySelectorAll(".submenu")
    subsAbertos.forEach(sub => {
        if (sub.style.transform === "scale(1)" && sub !== submenu) {
            sub.style.transform = "scale(0)"
            menusli.forEach(menuli => {
                if (menuli != evento) {
                    menuli.style.color = "rgb(102, 103, 103)"
                }
            });

        }
    })
}

const menuPrincipal = document.querySelector('.navHamburguer')
menuPrincipal.addEventListener('click', mostrarMenu)
const containerMenu = document.querySelector('.menu')

function mostrarMenu(event) {
    const icon = menuPrincipal.querySelector('i.fa-chevron-down, i.fa-chevron-up')

    if (icon.classList.contains('fa-chevron-down')) {
        icon.classList.remove('fa-chevron-down')
        icon.classList.add('fa-chevron-up')
        containerMenu.style.display = "block"
        menuPrincipal.style.color = "rgb(245, 16, 51)"
    } else {
        icon.classList.remove('fa-chevron-up')
        icon.classList.add('fa-chevron-down')
        containerMenu.style.display = "none"
        menuPrincipal.style.color = "rgb(102, 103, 103)"
    }

    const subsAbertos = document.querySelectorAll(".submenu")
    subsAbertos.forEach(sub => {
        if (sub.style.transform === "scale(1)") {
            sub.style.transform = "scale(0)"
            menusli.forEach(menuli => {
                menuli.style.color = "rgb(102, 103, 103)"
            })
        }
    })
}
