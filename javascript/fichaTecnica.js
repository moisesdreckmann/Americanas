
const tableTittleInfo = document.querySelectorAll('.containerTable__title')[0]
tableTittleInfo.addEventListener('click', controlaInfo)
const icon2Info = document.querySelectorAll('.icon2')[0]
const tableContentInfo = document.querySelectorAll('.containerTable__table')[0]

const tableTittle = document.querySelectorAll('.containerTable__title')[1]
tableTittle.addEventListener('click', controlaTable)
const icon2 = document.querySelectorAll('.icon2')[1]
const tableContent = document.querySelectorAll('.containerTable__table')[1]

function controlaInfo(event) {
    if (icon2Info.classList.contains('fa-chevron-down')) {
        icon2Info.classList.remove('fa-chevron-down')
        icon2Info.classList.add('fa-chevron-up')
        tableContentInfo.style.display = "block"
    } else {
        icon2Info.classList.remove('fa-chevron-up')
        icon2Info.classList.add('fa-chevron-down')
        tableContentInfo.style.display = "none"
    }
    event.stopPropagation()
}

function controlaTable(event) {
    if (icon2.classList.contains('fa-chevron-down')) {
        icon2.classList.remove('fa-chevron-down')
        icon2.classList.add('fa-chevron-up')
        tableContent.style.display = "block"
    } else {
        icon2.classList.remove('fa-chevron-up')
        icon2.classList.add('fa-chevron-down')
        tableContent.style.display = "none"
    }
    event.stopPropagation()
}