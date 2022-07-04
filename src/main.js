import busca from './busca.js'
import selEl, {criarElemento, adicionarFilhos} from './elementos.js'
import carrossel from './carrossel.js'

function listarPosts(listaPosts){
    const divlistaPosts = selEl('.listaPosts')
    for(let i = listaPosts.length - 1; i >= 0; i--){
        let post = listaPosts[i]
        const divPost = criarElemento('div', ['post'])
        const imgThumbReduzida = criarElemento('img', ['post_thumbnail'], '', '', `${post.id}/${post.thumbnail}`)
        // const imgThumb = criarElemento('img', ['post_thumbnail'], '', '', `${post.id}/${post.thumbnail}`, post.altThumbnail)
        const postCorpo = criarElemento('div', ['post_corpo'])
        const postTitulo = criarElemento('div', ['post_titulo'], '', post.titulo)
        const postConteudo = criarElemento('div', ['post_conteudo'], '', post.resumoConteudo)
        const postData = criarElemento('date', ['post_data'], '', post.data)
        adicionarFilhos(postCorpo, [postTitulo, postConteudo, postData])
        adicionarFilhos(divPost, [imgThumbReduzida, postCorpo])
        adicionarFilhos(divlistaPosts, [divPost])
    
        divPost.onclick = () => window.location.href = `post.php?post=${post.id}`
    }
}

const b = await busca()
carrossel(b)
listarPosts(b)