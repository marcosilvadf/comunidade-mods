let floatMenu = document.querySelector('.floatMenu')
let main = document.querySelector('main')

function menuFloat() {
    floatMenu.classList.toggle('active')
}

main.onclick = () => {
    floatMenu.classList.remove('active')
}