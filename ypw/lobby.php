<?php
    // ini_set('display_errors',1);  // Desativa exibição na tela
    // ini_set('log_errors', 1);      // Habilita o log de erros
    // ini_set('error_log', '/caminho/para/seu/arquivo_de_log.log');  // Define o caminho do log
    session_start();
    require_once 'conn.php';
    $nome=$_GET['nome'];
    $senha=$_GET['senha'];
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
            <h1 >Escolha Seu Caminho <?php echo $_GET['nome'];?></h1>
        </header>
        <nav class="full">
            <a class="a" href="linguagem.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Linguagem</a>
            <a class="a" href="area.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Área</a>
            <a class="a" href="conteudo.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Conteúdo</a>
            <a class="a" href="favorites.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Favoritos</a>
        </nav>
        <article class="flexd mid">
                <h3>O que verá em Linguaguens:</h3>
                Você poderá acesar materiais sobre linguaguens de programação
                e entender um pouco mais sobre ela.
        </article>
        <article class="flexd mid">
                <h3>O que verá em Área:</h3>
                Você poderá entender o que é uma área e conteúdos sobre a 
                área do seu desejo.
        </article>
        <article class="flexd mid">
                <h3>O que verá em Conteúdo:</h3>
                    Você poderá ver materiais sobre conteúdos
                    e o que é um conteúdo
        </article>
    </div>
</body>
</html>