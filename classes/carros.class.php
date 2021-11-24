<?php

    class Carros {

        private $pdo;//conexão com o banco

        public function __construct($pdo) {//conexão com o banco
            $this->pdo = $pdo;
        }


        //listar os carros - retorna um array com a lista de todos os carros cadastrados no banco 
        public function getCarros() {
            $array = array();

            $sql = "SELECT * FROM carro";
            $sql = $this->pdo->query($sql);

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll(); //se tiver algum carro armazena no $array
            }

            return $array;
        }


    }