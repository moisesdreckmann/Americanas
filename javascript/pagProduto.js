function carregaProduto(event) {
    const container = event.target.closest('.containerProdListagem')
    const code = container.querySelector('.pegarCode').value
    const produto = container.querySelector('.pegarNome').value
    const categoria = container.querySelector('.pegarCategoria').value
    window.location.href = 'produtos.php?amcd=' + code + '&produto=' + produto + '&amcat=' + categoria
}

function carregaProduto2(event) {
    const container = event.target.closest('.containerProd')
    const code = container.querySelector('.pegarCode').value
    const produto = container.querySelector('.pegarNome').value
    const categoria = container.querySelector('.pegarCategoria').value
    window.location.href = 'produtos.php?amcd=' + code + '&produto=' + produto + '&amcat=' + categoria
}

function carregaProduto3(event) { 
    const container = event.target.closest('.containerProd')
    const code = container.querySelector('.pegarCode2').value
    const produto = container.querySelector('.pegarNome2').value
    const categoria = container.querySelector('.pegarCategoria2').value
    window.location.href = 'produtos.php?amcd=' + code + '&produto=' + produto + '&amcat=' + categoria
}
