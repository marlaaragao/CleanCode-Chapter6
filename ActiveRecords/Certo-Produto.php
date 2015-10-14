<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produto extends ActiveRecords {
    
    private $_nome;
    private $_preco;
    private $_tableName;
    
    function __construct($nome, $preco) {

        $this->_nome = $nome;
        $this->_preco = $preco;
        
        $this->_tableName = 'produtos';
        parent::__construct($this->_tableName);
    }
            
    //Funções pertinentes da regra de negocio (...)
}

class Testa {
	
	function exemplo() {
		$p = new Produto($_POST['nome'], $_POST['preco']);
		$p->save();
	}
	
}

