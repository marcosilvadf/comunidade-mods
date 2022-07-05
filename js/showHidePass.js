let eye = document.querySelectorAll('.eye')
let input = document.querySelectorAll("input[type='password']")

for (let i = 0; i < eye.length; i++) {    
    eye[i].addEventListener('click', function(){
        if(input[i].getAttribute('type') == 'password')
        {
            eye[i].innerHTML = '<i class="fa-solid fa-eye-slash"></i>'
            input[i].setAttribute('type', 'text')
        }else
        {
            eye[i].innerHTML = '<i class="fa-solid fa-eye"></i>'
            input[i].setAttribute('type', 'password')
        }
    })
}