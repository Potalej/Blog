<?php
    # precisa verificar a variável de sessão
    session_start();

    # verifica se o usuário está logado
    if (!isset($_SESSION['logado'])){
        # se não estiver, manda de volta para a página inicial
        header('Location: index.php');
    }

    # recebe as informações dos inputs
    $altThumbnail = $_POST['alt_thumbnail'];
    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $altCapa = $_POST['alt_capa'];
    $conteudo = $_POST['conteudo'];
    $galeria = $_POST['galeria'];
    $altFotoGaleria = $_POST['alt_foto_galeria'];
    $legendaGaleria = $_POST['legenda_galeria'];

    # captura os arquivos
    $thumbnailArquivo = $_FILES['thumbnail_arquivo'];
    $tipo = strtolower(pathinfo($thumbnailArquivo['name'], PATHINFO_EXTENSION));
    $thumbnailArquivoNome = time().uniqid(rand()) . "." . $tipo;

    $capaArquivo = $_FILES['capa_arquivo'];
    $tipo = strtolower(pathinfo($capaArquivo['name'], PATHINFO_EXTENSION));
    $capaArquivoNome = time().uniqid(rand()) . "." . $tipo;
    
    $galeriaArquivo = $_FILES['galeria_arquivo'];
    $tipo = strtolower(pathinfo($galeriaArquivo['name'], PATHINFO_EXTENSION));
    $galeriaArquivoNome = time().uniqid(rand()) . "." . $tipo;    
    
    ######## QUERY ########
    # conectar ao banco
    include('../php/conexao_bd.php');
    
    # query
    $query = "
        INSERT INTO tb_posts
        (thumbnail, alt_thumbnail, titulo, resumo, capa, alt_capa, conteudo, galeria, foto_galeria, alt_foto_galeria, legenda_galeria)
        VALUES
        ('$thumbnailArquivoNome', '$altThumbnail', '$titulo', '$resumo', '$capaArquivoNome', '$altCapa', '$conteudo', '$galeria', '$galeriaArquivoNome', '$altFotoGaleria', '$legendaGaleria')
    ";

    # faz a query
    $resultado = $conexao->query($query);
    if(!$resultado) {
        echo "Erro na inserção no banco de dados!";
    }

    # captura o id do novo registro
    $idNovoPost = $conexao->insert_id;

    # encerra a conexão
    $conexao->close();

    ######## ARQUIVOS ########
    # se tiver dado certo a query, é preciso mover os arquivos
    $dir = "../img/$idNovoPost/";
    # cria o diretório
    mkdir($dir);
    # move
    move_uploaded_file($thumbnailArquivo['tmp_name'], $dir.$thumbnailArquivoNome);
    move_uploaded_file($capaArquivo['tmp_name'], $dir.$capaArquivoNome);
    move_uploaded_file($galeriaArquivo['tmp_name'], $dir.$galeriaArquivoNome);

    # retorna à página de criação de posts
    header('Location: criar_post.php?s=1');
?> 