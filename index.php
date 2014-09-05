<?php

//Pega request
$rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$filename = $rota['path'];

if(!file_exists($filename)){
  header('location:/erro.php');
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
            <?php require_once 'menu.php' ?>
            <?php

                require_once 'pagina.php';
                $pagina = new Pagina();
            
                if($_POST){

                    $pagina->setBusca($_POST['palavraChave']);

                    if($pagina->buscar()){
                        foreach($pagina->buscar() as $busca){
                            echo "<a href=".$busca['nome'].".php>".$busca['descricao']."</a><br>";
                        }
                    }

                } else {
            ?>

            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">
                    <label for="inputEmail2" class="col-sm-2 control-label">Buscar Palavra Chave</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="inputEmail4" placeholder="Palavra chave" name="palavraChave">
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
