<?php
    # inclui o arqivo de conexão
    include("./conexao_bd.php");

    # a query deve capturar todas as linhas da tabela de posts
    $query = "SELECT * FROM tb_posts";

    # faz a query de fato
    $resultado = $conexao->query($query);

    # encerra a conexão
    $conexao->close();

    header('Content-Type: application/json; charset=utf-8');

    # lista de posts
    $lista = array();

    while ($post = $resultado->fetch_assoc()){
        array_push($lista, $post);
    }

    print_r(json_encode($lista));
    
?>