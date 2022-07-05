let menuBox = document.querySelector('.boxMenu')
let contentMenu = document.querySelector('.contentMenu')
let menuIcon = document.querySelector('.menuIcon')
function showMenu()
{    
    menuBox.classList.toggle('show')
    contentMenu.classList.toggle('show')
    menuIcon.classList.toggle('active')
    window.scrollTo(0,0)
    let body = document.querySelector('body')
    if(menuIcon.classList.contains('active')){
    document.documentElement.style.overflowY = 'hidden'
    }else{
    document.documentElement.style.overflowY = 'auto'
    }
}    