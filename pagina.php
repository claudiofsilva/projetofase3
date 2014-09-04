<?php

require_once "conexao.php";

class Pagina {

    private $busca;
    private $idPagina;
    private $db;

   public function __construct()
   {
       $conexao = new Conexao();
       $this->db = $conexao->retornaConexao();
   }

   public function buscar()
   {

       $query = "SELECT * FROM paginas WHERE nome LIKE '%{$this->getBusca()}%'";
       $stmt = $this->db->query($query);
       return $stmt->fetchAll(\PDO::FETCH_ASSOC);

   }

    public function exibePagina()
    {
        $query = "SELECT * FROM paginas WHERE id = :id";
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









