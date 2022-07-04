<?php
    # inclui a conexão
    include('./conexao_bd.php');

    # captura os valores passados via POST
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
   
    # query para buscar essas informações
    // $query = "SELECT * FROM tb_login WHERE usuario = $usuario AND senha = $senha";
    $query = "SELECT senha FROM tb_login WHERE usuario ='$usuario'";

    # faz a query
    $resultado = $conexao->query($query);
    
    # encerra a conexão
    $conexao->close();

    if (!$resultado){
        echo "usuário não encontrado!";
    }
    else{
        # como só vai ter um usuário registrado, não precisa do while
        $linha = $resultado->fetch_assoc();
        # verifica se as senhas batem
        $senhaBate = password_verify($senha, $linha["senha"]);
        # se bater
        if ($senhaBate){
            # cria uma variável de sessão para poder confirmar na outra página
            session_start();
            $_SESSION['logado'] = true;
            
            echo 1;
        }
        else { echo 0; }
    }
    

?>