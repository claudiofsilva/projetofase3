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

    <div class="jumbotron">
        <?php
        require_once 'pagina.php';
        $home = new Pagina();
        $home->setNomePagina('empresa');
        $conteudoPagina = $home->exibeConteudo();

        if($conteudoPagina){ ?>
            <h1><?php echo $conteudoPagina['nome']; ?></h1>
            <p class="lead"><?php echo $conteudoPagina['descricao']; ?></p>
            <p><a class="btn btn-lg btn-success" href="#" role="button"><?php echo $conteudoPagina['nome']; ?></a></p>
        <?php } ?>

    </div>
    <?php require_once 'footer.php';?>
</div>

</body>
</html>
