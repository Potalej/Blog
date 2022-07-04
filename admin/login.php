<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.svg" type="image/x-icon">
    <title>Login</title>
    <!-- MaterializeCSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body class="container">
    <section class="container" style="text-align:center">
        <h1>Logar</h1>
        <div class="input-field">
            <input id="usuario" type="text" name="usuario">
            <label for="usuario">Usuário</label>
        </div>
        <div class="input-field">
            <input id="senha" type="password" name="senha">
            <label for="usuario">Senha</label>
        </div>
        <button class="btn" id="logar" onclick="logar()">Logar</button>
    </section>
    <!-- MaterializeJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function logar(){
            const usuario = document.getElementById('usuario').value;
            const senha = document.getElementById('senha').value;
            return new Promise(resolve => {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "../php/validacao.php", true);
                xmlhttp.onload = function() {
                    console.log(xmlhttp.responseText);
                    if(xmlhttp.responseText == 0){
                        alert("Usuário ou senha incorretos!");
                    }
                    else if(xmlhttp.responseText == 1){
                        window.location.href = "./criar_post.php";
                    }
                }
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(`usuario=${usuario}&senha=${senha}`);
            })
        }
    </script>
</body>
</html>