<?php

use PDO;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produto {
    
    private $_nome;
    private $_preco;
    private $_connection;
    
    function __construct($nome, $preco) {

        $this->_nome = $nome;
        $this->_preco = $preco;
        
        $this->conectaBanco();
    }
            
    function save() {
        $stmt = $this->_connection->prepare('INSERT INTO produto(id, nome, preco) VALUES (null, ?, ?)');
        $stmt->bindParam(1, $this->_nome);
        $stmt->bindParam(2, $this->_preco);

        $stmt->execute();
    }
    
    function findAll() {
        //
    }
    
    function delete() {
        //
    }
	
	function conectaBanco() {
        
        $ini_array = parse_ini_file("sample.ini");
        $servername = $ini_array['server'];
        $username = $ini_array['user'];
        $password = $ini_array['pass'];
        
        try {
            $this->_connection = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Falha na conexão com o banco: " . $e->getMessage();
        }
    }
}

class Testa {
	
	function exemplo() {
		$p = new Produto($_POST['nome'], $_POST['preco']);
		$p->save();
	}
	
}

