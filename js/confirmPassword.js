let pass = document.querySelector('#pass')
let confirmPass = document.querySelector('#confirmPass')
let form = document.querySelector('form')

form.addEventListener('submit', function (event){
    if(!(pass.value == confirmPass.value)){
        alert('Senhas não coincidem!')
        pass.style.borderBottom = '1px solid red'
        confirmPass.style.borderBottom = '1px solid red'
        event.preventDefault()
        var data = sessionStorage.getItem('teste')
        console.log(data)
    }
})