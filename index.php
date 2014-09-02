<?php

//Pega request
$rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//formata o path
$path= preg_replace('(^/)','',$rota['path']);

if($path){
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projeto fase 3</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fase1.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h3 class="text-muted">Projeto fase 3</h3>
            <?php
                require_once 'conexao.php';
                try{
                    $conexao = new \PDO("mysql:host=localhost;dbname=curso;","root","root");
                    $db = new Conexao($conexao);

                }
                catch(\PDOException $e){
                    die('Não foi possivel conectar ao banco de dados, código de erro: '.$e->getCode()." , Mensagem de erro: ".$e->getMessage());
                }
                if($_POST){

                    $db->setBusca($_POST['nomePagina']);

                    if($db->buscar()){
                        foreach($db->buscar() as $busca){
                            echo "<a href=?pagina=".$busca['id'].">".$busca['nome']."</a><br>";
                        }
                    }else{
                        echo  '<div class="jumbotron">
                            <h1>Busca não encontrada</h1>
                            <p class="lead">Busca não encontrada</p>
                            <p><a class="btn btn-lg btn-success" href="/" role="button">Voltar</a></p>
                        </div>';
                    }

                }elseif($_GET){
                    $db->setIdPagina($_GET['pagina']);
                    $pagina = $db->exibePagina();
                    if($pagina){
                      echo  '<div class="jumbotron">
                            <h1>'.$pagina["nome"].'</h1>
                            <p class="lead">'.$pagina['descricao'].'</p>
                            <p><a class="btn btn-lg btn-success" href="/" role="button">Voltar</a></p>
                        </div>';
                    }else{
                        echo  '<div class="jumbotron">
                            <h1>Erro</h1>
                            <p class="lead">Pagina não encontrada</p>
                            <p><a class="btn btn-lg btn-success" href="/" role="button">Voltar</a></p>
                        </div>';
                    }


                }else{
            ?>

            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">
                    <label for="inputEmail2" class="col-sm-2 control-label">Busca Pagina</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="inputEmail4" placeholder="Nome Pagina" name="nomePagina">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                </div>
            </form>

            <?php } ?>
            <?php require_once 'footer.php';?>

        </div>

    </body>
</html>
