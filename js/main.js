

const elemento = document.querySelector('.contenido-texto')

document.querySelector('#btn-copy').addEventListener('click',()=>{
    // mensaje copy
    
    //document.querySelector('.mensaje-copy').classList.add('show');
    
    copytoClickBoard(elemento)

    alert("¡Copiado al portapapeles!")

    //setTimeout(()=>{
        //document.querySelector('.mensaje-copy').classList.remove('show');
    //},1300)
})

function copytoClickBoard(elemento){
    const inputOculto = document.createElement('input')

    // envio valor/contenido
    inputOculto.setAttribute('value', elemento?.innerText)

    document.body.appendChild(inputOculto)

    inputOculto.select()
    navigator.clipboard.writeText(inputOculto.value)
    // document.execCommand('copy');

    document.body.removeChild(inputOculto)
}
