<?php
    ini_set('display_errors',1);  // Desativa exibição na tela
    ini_set('log_errors', 1);      // Habilita o log de erros
    ini_set('error_log', '/caminho/para/seu/arquivo_de_log.log');  // Define o caminho do log
    session_start();
    require_once 'conn.php';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $senha = $_POST["senha"];
        $nome = $_POST["nome"]; 
        $sql = "SELECT * FROM usuario WHERE nome='$nome';"; 
        $query_run = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query_run) == 0) { 
            $sql = "INSERT INTO usuario(nome,senha) VALUES ('$nome','$senha');"; 
            $query_run = mysqli_query($conn, $sql);
            header("Location: lobby.php?senha=$senha&nome=$nome"); 
            exit(0);
    }}
        $conn->close(); 
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Caminho da Programação</title>
    <link rel="stylesheet" href="css/algum.css">
    <script src="js/top.js"></script>
</head>
<body>
    <div class="container">
        <header class="full">
            <h1 >Escolha Seu Caminho</h1>
        </header>
        
    </div>
    <section class="mid flexd ">
    <form method="POST" class="form__group field">
        <input type="text" class="form__field" placeholder="Seu nome" name="nome" id='nome' required />
        <label for="name" class="form__label">Nome</label>
      
        <input type="password" class="form__field" placeholder="Sua senha" name="senha" id='senha' required />
        <label for="senha" class="form__label">Senha</label>
      
        <button type="submit" class="button-enter" name="registrar">Registrar</button></form>
    </section>
   
</body>
</html>