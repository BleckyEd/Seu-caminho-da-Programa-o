<?php
    // ini_set('display_errors',1);  // Desativa exibição na tela
    // ini_set('log_errors', 1);      // Habilita o log de erros
    // ini_set('error_log', '/caminho/para/seu/arquivo_de_log.log');  // Define o caminho do log
    session_start();
    require_once 'conn.php';
    $nome=$_GET['nome'];
    $senha=$_GET['senha'];
    $acao=$_GET['acao'];
    $dic = array(
        "LV" => "Livro",
        "ST" => "Site",
        "VD" => "Vídeo"
    );
    if ($acao=='favoritar'){
        $id=$_GET['id'];
        $query = "INSERT INTO usuario_material(nome_us,id_mat) VALUES 
        ('$nome','$id');";
        $query_run = mysqli_query($conn, $query);
    }
    elseif($acao=='desfavoritar'){
        $id=$_GET['id'];
        $query = "DELETE FROM usuario_material where id_mat='$id' and nome_us='$nome';";
        $query_run = mysqli_query($conn, $query);
    }
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
            <h1 >Área</h1>
        </header>
        <nav class="full">
            <a class="a" href="lobby.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Início</a>
            <a class="a" href="linguagem.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&acao=entrar">Linguagem</a>
            <a class="a" href="conteudo.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&acao=entrar">Conteúdo</a>
            <a class="a" href="favorites.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>">Favoritos</a>
        </nav>
        <section class="mid flexc">
        <h1>Materiais</h1>
        <table id="table"> 
        <tr>
                    <th>Área</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Favoritar</th>
                </tr>
                <tr>
                    <th>
                        <select onchange="pecchanged()" id="pec" name="languagename">
                            <option value="td">Todos</option>
                            <option value="Computação Gráfica">Computação Gráfica</option>

                          </select>
                    </td>
                    <th>
                        <input type="search" id="mt" name="materialname" placeholder="Nome" onsearch="mtchanged()">
                    </th>
                    <th>
                        <select onchange="tipochanged()" id="tipo" name="languagetipo">
                            <option value="td">Todos</option>
                            <option value="Site">Site</option>
                            <option value="Livro">Livro</option>
                            <option value="Vídeo">Vídeo</option>
                        </select>
                    </th>
                </tr>
                <?php 
                    $query = "SELECT * FROM material where area!=''";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $material)
                            {
                                $mtn=$material['nome']
                                ?>
                                <tr>
                                    <td data-pec="<?= $material['area']; ?>"><?= $material['area']; ?></td>
                                    <td data-mt="<?= $material['nome']; ?>"><a  id="mt" href="<?php echo $material['link']; ?>"><?= $material['nome']; ?></a></td>
                                    <td data-tipo="<?= $dic[substr($material['id'],0,2)]; ?>"><?= $dic[substr($material['id'],0,2)]; ?></td>
                                    <td>
                                    <?php
                                         $query = "SELECT * FROM material,usuario,usuario_material where material.id=usuario_material.id_mat and usuario_material.nome_us=usuario.nome and usuario.nome='$nome' and material.nome='$mtn'";
                                         $query_run = mysqli_query($conn, $query);
                                         if(mysqli_num_rows($query_run) > 0){?>
                                            <a id="mt" href="area.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&id=<?php echo $material['id'] ?>&acao=desfavoritar">Desfavoritar</a>
                                            <?php 
                                         }else{?>
                                            <a id="mt" href="area.php?senha=<?php echo $senha?>&nome=<?php echo $nome?>&id=<?php echo $material['id'] ?>&acao=favoritar"">Favoritar</a>
                                            <?php
                                         } ?>
                                         
                                     </td>
                                
                                
                                </tr>
                                <?php
                            }
                        }
            ?>
            </table>
        </section>
        <article class="mid flexd">
            <h3>O que é uma Área:</h3>
            Uma "área" é como uma parte de um grande quebra-cabeça. Cada área é um pedaço 
            diferente que se concentra em algo específico. Por exemplo, na Tecnologia da Informação,
             temos áreas como desenvolvimento de software, segurança e redes. 
             Cada uma delas tem suas próprias tarefas e pessoas que trabalham nelas. 
             É assim que as coisas funcionam em partes, para que tudo funcione melhor!
    </article>
    </div>
</body>
</html>