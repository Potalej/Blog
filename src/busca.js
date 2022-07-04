async function busca(id=''){
    const data = await lerJSON('./php/listar_posts.php')
    if(id==''){ return data }
    else{
        return data[id]
    }
}

export default busca

function lerJSON(arquivo){
    return new Promise(resolve => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            resolve(JSON.parse(xmlhttp.responseText));
        }
        xmlhttp.open("GET", arquivo);
        xmlhttp.send();
    })
}