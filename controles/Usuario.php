<?php

/*
 * contém as funcionalidades do Usuario
 * não será acessado pelo usuário final
 */

include_once 'Conectar.php';

class Usuario
{

    private $id;
    private $email;
    private $senha;
    private $con;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function consultar()
    {
        $this->con = new Conectar();
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?;";
        $executar = $this->con->prepare($sql);
        $executar->bindValue(1, $this->email);
        $executar->bindValue(2, sha1($this->senha));

        return $executar->execute() == 1 ? $executar->fetchColumn() : false;
    }
}
