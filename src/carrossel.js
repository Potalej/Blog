import selEl, {criarElemento, adicionarFilhos} from './elementos.js'

function carrossel(lista){
    const botaoEsq = document.getElementById('scrollEsq');
    const botaoDir = document.getElementById('scrollDir');
    const carrosselLinha = document.querySelector('.carrosselFotos');

    botaoEsq.onclick = () => {
        carrosselLinha.scrollTo({
            left: carrosselLinha.scrollLeft - 210,
            behavior: 'smooth'
        })
    }
    botaoDir.onclick = () => {
        carrosselLinha.scrollTo({
            left: carrosselLinha.scrollLeft + 210,
            behavior: 'smooth'
        })
    }

    lista.map(post => {
        if(parseInt(post.galeria) == 1){
            const divFoto = criarElemento('div', ['foto'])
            const imgFoto = criarElemento('img', '', '', '', `${post.id}/${post.foto_galeria}`, post.alt_foto_galeria)
            const legendaFoto = criarElemento("div", '', '', post.legenda_galeria)
            adicionarFilhos(divFoto, [imgFoto, legendaFoto])
            carrosselLinha.appendChild(divFoto)
            divFoto.onclick = () => window.location.href = `post.php?post=${post.id}`
        }
    })
}


export default carrossel