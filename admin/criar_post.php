<?php
    # inicia a sessão
    session_start();

    # verifica se o usuário está logado
    if (!isset($_SESSION['logado'])){
        # se não estiver, manda de volta para a página inicial
        header('Location: ../index.php');
    }

    # verifica se tem algum parâmetro get
    if (isset($_GET['s'])){
        # se tiver, então está vindo de um recém sucesso de adição de dado, dá um alerta
        echo "<script>alert('Post inserido com sucesso!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.svg" type="image/x-icon">
    <title>Criar post</title>
    <!-- MaterializeCSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            padding-top: 20px;
        }
    </style>
</head>
<body class="container">
    <form action="../php/encerrar_sessao.php">
        <input type="submit" id="sair" class="btn red" value="Sair">
    </form>

    <section id="campos" class="container row">
        <div class="col s12 center">
            <h1>Criar post</h1>
        </div>
        <form method="post" enctype="multipart/form-data" action="adicionar_post.php">
            <div class="file-field input-field col s6">
                <div class="btn blue" style="font-size:smaller">
                    <span>Arquivo</span>
                    <input type="file" name="thumbnail_arquivo" id="thumbnail_arquivo">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate" id="thumbnail" name="thumbnail" placeholder="Thumbnail">
                </div>
            </div>
            <div class="input-field col s6">
                <input type="text" id="alt_thumbnail" name="alt_thumbnail">
                <label for="alt_thumbnail">Alt da thumbnail</label>
            </div>
            <div class="input-field col s16">
                <input type="text" id="titulo" name="titulo">
                <label for="titulo">Título</label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="resumo" name="resumo">
                <label for="resumo">Resumo</label>
            </div>
            <div class="file-field input-field col s6">
                <div class="btn blue" style="font-size:smaller">
                    <span>Arquivo</span>
                    <input type="file" name="capa_arquivo" id="capa_arquivo">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate" id="capa" name="capa" placeholder="Capa">
                </div>
            </div>
            <div class="input-field col s6">
                <input type="text" id="alt_capa" name="alt_capa">
                <label for="alt_capa">Alt da capa</label>
            </div>
            <div class="input-field col s12">
                <textarea name="conteudo" id="conteudo" cols="30" rows="10" class="materialize-textarea"></textarea>
                <label for="conteudo">Conteúdo...</label>
            </div>
            <div class="input-field col s6">
                <input type="text" id="galeria" name="galeria">
                <label for="galeria">Galeria</label>
            </div>
            <div class="file-field input-field col s6">
                <div class="btn blue" style="font-size:smaller">
                    <span>Arquivo</span>
                    <input type="file" name="galeria_arquivo" id="galeria_arquivo">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate" id="foto_galeria" name="foto_galeria" placeholder="Foto_galeria">
                </div>
            </div>
            <div class="input-field col s6">
                <input type="text" id="alt_foto_galeria" name="alt_foto_galeria">
                <label for="alt_foto_galeria">Alt da foto da galeria</label>
            </div>
            <div class="input-field col s6">
                <input type="text" id="legenda_galeria" name="legenda_galeria">
                <label for="legenda_galeria">Legenda da galeria</label>
            </div>

            <div class="col s12 center">
                <button class="btn green" id="criarPost">Criar Post</button>
            </div>
        </form>
    </section>

    <!-- MaterializeJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>