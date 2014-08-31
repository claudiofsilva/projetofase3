<?php

try{
    $conexao = new \PDO("mysql: host=localhost;dbname=curso;","root","root");


}
catch (\PDOException $e){
    die('Não foi possivel efetuar conexão com banco de dados, código de erro : '.$e->getCode(). ', mensagem de erro: '.$e->getMessage());
}