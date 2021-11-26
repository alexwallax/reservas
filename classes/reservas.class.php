<?php

    class Reservas {

        private $pdo;//conexão com o banco

        public function __construct($pdo) {//conexão com o banco
            $this->pdo = $pdo;
        }

        public function getReservas($data_inicio, $data_fim) {//listar todas as reservas
            $array = array();

            $sql = "SELECT * FROM reservas WHERE ( NOT ( data_inicio > :data_fim OR data_fim < :data_inicio ) )"; //query de busca 
            $sql = $this->pdo->prepare($sql); //execução da query
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->execute();

            if($sql->rowCount() > 0) { //verifica se teve algum retorno
                $array = $sql->fetchAll(); //se teve retorno pega todas as reservas e coloca no $array
            }

            return $array;

        }

        public function verificarDisponibilidade($carro, $data_inicio, $data_fim) {

            $sql = "SELECT
            *
            FROM reservas
            WHERE
            id_carro = :carro AND
            ( NOT ( data_inicio > :data_fim OR data_fim < :data_inicio ) )";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":carro", $carro);
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->execute();

            if($sql->rowCount() > 0) { //verifica se houve resultado, o carro já esta alugado
                return false;
            } else {
                return true;
            }

        }

        public function reservar($carro, $data_inicio, $data_fim, $pessoa) {
            $sql = "INSERT INTO reservas (id_carro, data_inicio, data_fim, pessoa) VALUES (:carro, :data_inicio, :data_fim, :pessoa)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":carro", $carro);
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->bindValue(":pessoa", $pessoa);
            $sql->execute();
        }

    }