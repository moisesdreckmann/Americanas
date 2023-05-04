var eyePass = document.querySelectorAll('.fa-eye-slash')

eyePass.forEach(pass => {
    pass.addEventListener('click', seePass)
});

function seePass(event) {

    var inputs = document.querySelectorAll('.inputEyePass')

    if(this) {
        inputs.forEach(input => {
            if(input.type == 'password') {
                input.type = 'text'
                this.classList.remove('fa-eye-slash')
                this.classList.add('fa-eye')
            } else {
                input.type = 'password'
                this.classList.remove('fa-eye')
                this.classList.add('fa-eye-slash')
            }
        })
    }

    
    
}