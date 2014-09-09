<?php

class Conexao{
    private $db;

    public function __construct(){
        $conexao = new \PDO("mysql: host=localhost;dbname=curso","root","root");
        $this->db = $conexao;
    }

    public function retornaConexao(){
        return $this->db;
    }

}