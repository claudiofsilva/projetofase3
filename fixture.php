<?php

require_once "conexao.php";

$conexao = new Conexao();
$db = $conexao->retornaConexao();

if($db){
	//nome da tabela banco
	$nomeTabela = "paginas";
	
	//query que verifica se existe tabela no banco
	$query = "SHOW TABLES LIKE '{$nomeTabela}'";	
	$tabela = $db->query($query)->rowCount() > 0;
	
	//Se existir a tabela ela � excluida
	if($tabela){
		$queryExcluir = "DROP TABLE {$nomeTabela}";
		$dropTable = $db->prepare($queryExcluir);
		$dropTable->execute();
        echo "Tabela atual {$nomeTabela} Deletada, execute o arquivo novamente para criar nova estrutura de teste";

	}else{
        //Cria nova estrutura de banco de dados
		$queryCriaTabela = "CREATE TABLE {$nomeTabela}(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(255) NOT NULL,
			descricao VARCHAR(255),
			PRIMARY KEY (id)
		)";

		//Execução da query
		$tabelaCriada = $db->exec($queryCriaTabela);

		if($tabelaCriada != 0){
			print_r($db->errorInfo());
		}else{
			echo "tabela Criada com sucesso!!!<br><br>";

            //Query para fazer inserção na tabela criada
            $queryInsercao = "INSERT INTO {$nomeTabela} (nome,descricao) VALUES ('home','pagina home');
                              INSERT INTO {$nomeTabela} (nome,descricao) VALUES ('produtos','pagina produto');
                              INSERT INTO {$nomeTabela} (nome,descricao) VALUES ('servicos','pagina servicos');
                              INSERT INTO {$nomeTabela} (nome,descricao) VALUES ('contato','pagina contato');
                              INSERT INTO {$nomeTabela} (nome,descricao) VALUES ('empresa','pagina empresa')";

            $insert = $db->exec($queryInsercao);

            if($insert){
                echo "Dados inseridos com sucesso na tabela {$nomeTabela}";
            }else{
                echo "Não foi possível inserir dados na tabela {$nomeTabela}";
            }
		}
		
	}
	
	
	
	
}