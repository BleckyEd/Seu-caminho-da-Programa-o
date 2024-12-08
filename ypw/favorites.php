<?php
    // ini_set('display_errors',1);  // Desativa exibição na tela
    // ini_set('log_errors', 1);      // Habilita o log de erros
    // ini_set('error_log', '/caminho/para/seu/arquivo_de_log.log');  // Define o caminho do log
    session_start();
    require_once 'conn.php';
    $nome=$_GET['nome'];
    $senha=$_GET['senha'];
    $dic = array(
        "LV" => "Livro",
        "ST" => "Site",
        "VD" => "Vídeo"
    );

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
            <h1 >Favoritos</h1>
        </header>
        <nav class="full">
            <a class="a" href="lobby.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Início</a>
            <a class="a" href="area.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&acao=entrar">Área</a>
            <a class="a" href="conteudo.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&acao=entrar">Conteúdo</a>
            <a class="a" href="linguagem.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&acao=entrar">Linguagem</a>
        </nav>
        <section class="mid flexc">
            <h1>Materiais</h1>
            
            <table id="table">
                <tr>
                    <th>Peculiaridade</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                </tr>
                <?php 
                    $query = "SELECT material.nome,material.link,material.id,material.linguagem FROM material,usuario,usuario_material where material.id=usuario_material.id_mat and usuario_material.nome_us=usuario.nome and usuario.nome='$nome' and material.linguagem!=''";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $material)
                            {
                                ?>
                                <tr>
                                    <td data-pec="<?= $material['linguagem']; ?>"><?= $material['linguagem']; ?></td>
                                    <td data-mt="<?= $material['nome']; ?>"><a id="mt" href="<?php echo $material['link']; ?>"><?= $material['nome']; ?></a></td>
                                    <td data-tipo="<?= $dic[substr($material['id'],0,2)]; ?>"><?= $dic[substr($material['id'],0,2)]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    $query = "SELECT material.nome,material.link,material.id,material.conteudo FROM material,usuario,usuario_material where material.id=usuario_material.id_mat and usuario_material.nome_us=usuario.nome and usuario.nome='$nome' and material.conteudo!=''";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $material)
                            {
                                ?>
                                <tr>
                                    <td data-pec="<?= $material['conteudo']; ?>"><?= $material['conteudo']; ?></td>
                                    <td data-mt="<?= $material['nome']; ?>"><a  id="mt" href="<?php echo $material['link']; ?>"><?= $material['nome']; ?></a></td>
                                    <td data-tipo="<?= $dic[substr($material['id'],0,2)]; ?>"><?= $dic[substr($material['id'],0,2)]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    $query = "SELECT material.nome,material.link,material.id,material.area FROM material,usuario,usuario_material where material.id=usuario_material.id_mat and usuario_material.nome_us=usuario.nome and usuario.nome='$nome' and material.area!=''";
                    $query_run = mysqli_query($conn, $query);    
                    if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $material)
                            {
                                ?>
                                <tr>
                                    <td data-pec="<?= $material['area']; ?>"><?= $material['area']; ?></td>
                                    <td data-mt="<?= $material['nome']; ?>"><a  id="mt" href="<?php echo $material['link']; ?>"><?= $material['nome']; ?></a></td>
                                    <td data-tipo="<?= $dic[substr($material['id'],0,2)]; ?>"><?= $dic[substr($material['id'],0,2)]; ?></td>
                                </tr>
                                <?php
                            }
                        }
            ?>
        </section>

    </div>
</body>
</html>