import busca from './busca.js'
import selEl, {criarElemento, adicionarFilhos, converterData} from './elementos.js'


const postId = location.search.replace('?', '').split('=')[1]

// faz busca pelos dados do post...
const post = await busca(postId)

function corpoPost(post){
    document.title = ':) - ' + post.titulo

    selEl('#dataPost').textContent = converterData(post.data)
    const secaoPostDiv = selEl('.secaoPost')
    const imgCapaEl = criarElemento('img', ['capa'], '', '', post.id + '/' + post.capa)
    document.body.prepend(imgCapaEl)
    
    const conteudo = criarElemento('div', '')
    conteudo.innerHTML = post.conteudo
    secaoPostDiv.appendChild(conteudo)
}
corpoPost(post)