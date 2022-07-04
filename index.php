<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <title>MinhasPubs</title>
    <!-- MaterializeCSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="container">
    <h1 class="logo"><i class="fas fa-chess-knight"></i> Minhas Pubs</h1>
    <h2>Anotações, traduções, fotos, etc., só algumas publicações.</h2>

    <section class="posts">
        <h1 class="tituloSecao"><i class="fas fa-dice-d20"></i> Posts</h1>
        <div class="listaPosts">
        </div>
    </section>

    <section class="galeria">
        <h1 class="tituloSecao"><i class="fas fa-camera"></i> Galeria</h1>
        <div class="galeriaLinha">
            <a id="scrollEsq"><i class="fas fa-angle-left"></i></a>
            <div class="carrosselFotos">
            </div>
            <a id="scrollDir"><i class="fas fa-angle-right"></i></a>
        </div>
    </section>

    <!-- MaterializeJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="src/main.js" type="module"></script>
</body>
</html>