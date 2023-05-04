window.onload = function() {
    const preco1 = document.getElementsByName('precoprod')[0]
    preco1.addEventListener('keypress', validaNum)
    preco1.addEventListener('keypress', applyCurrencyMask)

    const preco2 = document.getElementsByName('alterapreco')
    preco2.forEach(preco => {
        preco.addEventListener('keypress', validaNum)
        preco.addEventListener('keypress', applyCurrencyMask)
    });
}

function validaNum(event) {
    if(event.keyCode < 48 || event.keyCode > 57){
        event.preventDefault() 
    }
}

function applyCurrencyMask(event) {

    var value = event.target.value;

    if(value.length < 9) {
        
    // Remove all non-numeric characters from the value
    value = value.replace(/\D/g, "");
  
    // Add a comma before the last two digits
    value = value.replace(/(\d{1,1})$/, ",$1");
  
    // Add a period every three digits
    value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  
    // Assign the modified value back to the input element
    event.target.value = value;
    }

}