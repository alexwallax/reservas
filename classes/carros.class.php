<?php

    class Carros {

        private $pdo;//conexão com o banco

        public function __construct($pdo) {//conexão com o banco
            $this->pdo = $pdo;
        }


    }