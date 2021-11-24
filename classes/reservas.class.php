<?php

    class Reservas {

        private $pdo;//conexão com o banco

        public function __construct($pdo) {//conexão com o banco
            $this->pdo = $pdo;
        }

        public function getReservas() {//listar todas as reservas
            $array = array();

            $sql = "SELECT * FROM tv_reservas";

            return $array;

        }
    }