<?php
    // ini_set('display_errors',1);  // Desativa exibição na tela
    // ini_set('log_errors', 1);      // Habilita o log de erros
    // ini_set('error_log', '/caminho/para/seu/arquivo_de_log.log');  // Define o caminho do log
    session_start();
    require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Caminho da Programação</title>
    <link rel="stylesheet" href="css/algum.css">
</head>
<body>
    <div class="container">
        <header class="full">
            <h1 >Escolha Seu Caminho</h1>
        </header>
        <nav class="full">
            <a class="a" href="entrar.php">Entrar</a></li>
            <a class="a" href="registrar.php">Registrar</a></li>
        </nav>
    </div>
</body>
</html>