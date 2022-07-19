const divNav = document.querySelector('#nav')

function listAll(link, callback) {
    if(divNav == null){
        console.log('Você precisa adicionar uma div com id nav!')
        return false
    }
    divNav.innerHTML = "<iframe src='' frameborder='' id='sqlNav'></iframe>"
    let sqlNav = document.querySelector('#sqlNav')
    divAll.classList.add('active')
    sqlNav.src = `${link}`

    let timer = setInterval(() => {
    if(sessionStorage.getItem('sqlRes') !== null){
        clearInterval(timer)
        divNav.innerHTML = ''
        let data = JSON.parse(sessionStorage.getItem('sqlRes'))
        sessionStorage.removeItem('sqlRes')
        callback(data)
        }
    }, 50)
}