let image = document.querySelector('img.profile')
let file = document.querySelector('#prof')
let span = document.querySelector('div.profile label span')

file.addEventListener('change', function()
{
    if(file.files.length <= 0)
    {
        return
    }

    let reader = new FileReader()

    reader.onload = function ()
    {        
        image.src = reader.result
        span.innerHTML = file.files[0].name
        
        let timer = setInterval(() => {
            clearInterval(timer)
            let pixelWidth = image.naturalWidth
            let pixelHeight = image.naturalHeight

            if(!(pixelWidth == pixelHeight))
            {
                file.value = ''
                span.innerHTML = 'Selecione a imagem de perfil'
                image.src = '../image/logo.png'
                alert('As imagens de perfil devem ser quadradas, máximo: 1080x1080 pixels')
            }

            if(pixelWidth > 1080)
            {
                file.value = ''
                span.innerHTML = 'Selecione a imagem de perfil'
                image.src = '../image/logo.png'
                alert('Essa imagem excede o tamanho, máximo: 1080x1080 pixels')
            }
        }, 100);
    }

    reader.readAsDataURL(file.files[0])
})