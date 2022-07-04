<?php
    include('./php/conexao_bd.php');
    
    # captura o ID do post no GET
    $id_post = $_GET["post"];
    
    # query que capturará as informações do post
    $query = "SELECT * FROM tb_posts WHERE id=$id_post";

    # faz a query
    $resultado = $conexao->query($query);
    $post = $resultado->fetch_assoc();

    # encerra a conexão para evitar problemas
    $conexao->close();

    # verifica se a conexão retornou algo
    if ($resultado->num_rows == 0){
        echo "<html><h1>Sem posts por aqui...</h1></html>";
    }
    else{
        # formata a data
        $data_array = explode("-", $post["data"]);
        $meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        $mes = $data_array[1]-1;
        $data_formatada = "$data_array[2] de $meses[$mes] de $data_array[0]";

        # formata o conteúdo
        $conteudo = str_replace("\\n", "", $post["conteudo"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <title>:) - <?php echo $post["titulo"]; ?></title>
    <!-- MaterializeCSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/post.css">

    <style>
        p{
            text-indent: 1.5em;
            margin-top: 0
        }
    </style>
</head>
    <body class="container">
        <img class="capa" src='<?php echo "./img/".$post['id']."/".$post["capa"]; ?>' alt="">
        <span style="float: right;" id="dataPost"><?php echo $data_formatada; ?></span>
        <a href="index.php">&lt; Voltar</a>

        <section class="secaoPost">
            <div>
                <?php echo $conteudo; ?>
            </div>
        </section>

        <!-- MaterializeJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>

<?php } ?>