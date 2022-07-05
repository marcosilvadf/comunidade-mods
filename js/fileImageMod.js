let image = document.querySelector('img.banner')
let file = document.querySelector('#modImage')
let span = document.querySelector('div.modImage label span')

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
            let ratio = parseFloat((pixelWidth / pixelHeight).toFixed(2))

            if(!(ratio == 1.78))
            {
                file.value = ''
                span.innerHTML = 'Selecione a capa'
                image.src = '../image/banner-mods.jpg'
                alert('A imagem da capa deve ser 16:9, máximo: 2560x1440 pixels')
            }

            if(pixelWidth > 2560)
            {
                file.value = ''
                span.innerHTML = 'Selecione a capa'
                image.src = '../image/banner-mods.jpg'
                alert('Essa imagem excede o tamanho, máximo: 2560x1440 pixels')
            }
        }, 100);
    }

    reader.readAsDataURL(file.files[0])    
})