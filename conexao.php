<?php

class Conexao{

    private $db;
    private $busca;
    private $idPagina;
	private $banco;
	private $table;
	
    public function __construct($banco,$table)
    {
        try{
			$this->banco = $banco;
			$this->table = $table;
			$conexao = new \PDO("mysql:host=localhost;dbname=".$this->banco.";","root","");
			$this->db = $conexao;
		}
		catch(\PDOException $e){
			die('Não foi posssivel conectar ao banco de dados, código de erro: '.$e->getCode().' , mensagem de erro: '.$e->getMessage());
		}
    }

    public function buscar()
    {
        $query = "SELECT * FROM {$this->table} WHERE nome LIKE '%{$this->getBusca()}%'";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function exibePagina()
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id",$this->getIdPagina());
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function setBusca($busca)
    {
        $this->busca = $busca;
        return $this;
    }


    public function getBusca()
    {
        return $this->busca;
    }
	
	public function setIdPagina($idPagina)
    {
        $this->idPagina = $idPagina;
        return $this;
    }

    function getIdPagina()
    {
        return $this->idPagina;
    }

}









