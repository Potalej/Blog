<?php
    # nome do servidor
    $servidor = "localhost";
    # nome do banco de dados
    $banco = "bd_blog";
    # dados de acesso
    $usuario = "root";
    $senha = "";
    
    # conexão
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    # checa a conexão
    if ($conexao->connect_error){
        die("Erro na conexão: $conn->connect_error");
    }
?>