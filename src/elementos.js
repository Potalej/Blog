const DIR = './img'

export function criarElemento(qual, classes, id='', innerText='', src='', alt=''){
    const el = document.createElement(qual)
    if(qual == 'date'){
        let data = innerText.split('-')
        el.setAttribute('datetime', `${data[2]}-${data[1]}-${data[0]}`)
        innerText = converterData(innerText)
    }
    if(classes!='') el.classList.add(classes)
    if(id != '') el.id = id
    if(innerText != '') el.innerText = innerText
    if(src != '') {
        el.src = `${DIR}/${src}`
        el.alt = alt
    }
    return el
}
function selEl(identificador){
    return document.querySelector(identificador)
}

export function adicionarFilhos(pai, listaFilhos){
    listaFilhos.map(filho => pai.appendChild(filho))
}

export function converterData(data){
    const [ano, mes, dia] = data.split('-')
    const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto','Setembro', 'Outubro', 'Novembro', 'Dezembro']
    return `${dia} de ${meses[mes-1]} de ${ano}`
}

export default selEl