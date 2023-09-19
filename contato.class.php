<?php

class Contato {
    private $pdo;
    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=CRUD;host=127.0.0.1", "root", "");
        
    }
    // CREATE
    public function adicionar($email, $nome = '') {
        // Verificar se o Email ja existe no sistema
        // adicionar

        if($this->existeEmail($email) == false) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    // READ
    public function getNome($email) {
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch();

            return $info['nome'];
        } else {
            return '';
        }
    }
    // READ
    public function getAll() {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function getInfo($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }
    // UPDATE
    public function editar($nome, $email, $id) {
        if($this->existeEmail($email) == false) {
            $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }
    // DELETE
    public function excluir($id) {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

    public function existeEmail($email) {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

  
} 