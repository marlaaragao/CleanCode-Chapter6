<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActiveRecords {
    
    private $_connection;
    private $_tableName;
    
    public function __construct($tableName) {
        $this->conectaBanco();
        $this->_tableName = $tableName;
    }
    
    /**
     * Implementação para insert usando nome da tabela e array associativo de dados
     * @param type $dataArray Ex: array('nomeColuna' => 'valorColuna')
     */
    public function save($object) {
        
        $tableName = $this->_tableName;
		$dataArray = (array) $object;
        
        $sql = 'INSERT INTO ' . $tableName . ' ( ';
        $sql .= implode(',', array_keys($dataArray)) . ') VALUES (';
        $sql .= implode(',', array_values($dataArray)) . ')'; //Somente para exemplo
                                                             //Deve-se usar prepareStatement
        try {
            $stmt = $this->_connection->prepare($sql);

            $stmt->execute();
            
            echo 'Registro inserido com sucesso.';
            
        }  catch (Exception $e) {
            echo 'Ocorreu um erro na inserção.';
        }
    }
    
    public function findByPrimaryKey($pk) {
        //Implementação para find
    }
    
    public function deleteByPrimaryKey($pk) {
        //Implemetaçao para delete
    }
    
    //[...]
    
    private function conectaBanco() {
        
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


