const menuPrincipal = document.querySelector('.navHamburguer2')
menuPrincipal.addEventListener('click', mostrarMenu)

const containerMenu = document.querySelector('.menu2')

const menusli = document.querySelectorAll('.menuli2')

menusli.forEach(menuli => {
    const submenu = menuli.querySelector('.submenu2')
    const submenuHeight = submenu.scrollHeight
    submenu.style.maxHeight = '0'

    menuli.addEventListener('click', () => {
        const outrosSubmenus = document.querySelectorAll('.submenu2')

        outrosSubmenus.forEach(outroSubmenu => {
            if (outroSubmenu !== submenu && outroSubmenu.style.maxHeight !== '0') {
                outroSubmenu.style.maxHeight = '0'
                outroSubmenu.parentNode.style.color = "rgb(102, 103, 103)"
            }
        });

        if (submenu.style.maxHeight === '0px') {
            submenu.style.maxHeight = submenuHeight + 'px'
            menuli.style.color = "rgb(245, 16, 51)"
        } else {
            submenu.style.maxHeight = '0'
            menuli.style.color = "rgb(102, 103, 103)"
        }
    });
});



function mostrarMenu(event) {
    const icon = menuPrincipal.querySelector('i.fa-chevron-down, i.fa-chevron-up')

    if (icon.classList.contains('fa-chevron-down')) {
        icon.classList.remove('fa-chevron-down')
        icon.classList.add('fa-chevron-up')
        containerMenu.style.maxHeight = "800px"
        menuPrincipal.style.color = "rgb(245, 16, 51)"
    } else {
        icon.classList.remove('fa-chevron-up')
        icon.classList.add('fa-chevron-down')
        containerMenu.style.maxHeight = "0"
        menuPrincipal.style.color = "rgb(102, 103, 103)"
    }

    const subsAbertos = document.querySelectorAll(".submenu2")
    subsAbertos.forEach(sub => {
        if (sub.style.maxHeight) {
            sub.style.maxHeight = "0"
            menusli.forEach(menuli => {
                menuli.style.color = "rgb(102, 103, 103)"
            })
        }
    })
}
