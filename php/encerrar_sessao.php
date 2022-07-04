<?php
    # inicia a sessão...
    session_start();
    # ...para poder destruí-la
    session_destroy();
    # e manda para a página inicial de volta
    header('Location: ../index.php');
?>