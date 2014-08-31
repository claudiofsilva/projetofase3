<?php

//Valida rota
function rotas($parametro){
    //Se não foi passado parametro chama arquivo home.php
    if(!$parametro){
        return 'home.php';
    }else{
        //rotas validas
        $rotasValidas = array('empresa','contato','produtos','home','servicos');

        //Verifica se o parametro é uma rota valida
        if(in_array($parametro,$rotasValidas)){
            return  $parametro.'.php';
        }else{
            return 'erro.php';
        }

    }
}

//Pega request
$rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//formata o path
$path= preg_replace('(^/)','',$rota['path']);

//Verifica se existe erro e retorna STATUS CODE 404
if(rotas($path) == 'erro.php'){
    http_response_code(404);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projeto fase 1</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fase1.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">

            <?php
                //adiciona menu
                require_once('menu.php');

                //adiciona path
                require_once(rotas($path));

                //adciona rodapé
                require_once('footer.php');
            ?>

        </div>

    </body>
</html>
