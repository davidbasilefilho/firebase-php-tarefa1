<?php
class Funcionario
{
    private $firebaseUrl = 'https://app2dsams-db1c2-default-rtdb.firebaseio.com/';

    private $dadosJson;

    public function getDadosJson()
    {
        return $this->dadosJson;
    }

    public function setDadosJson($dadosJson): self
    {
        $this->dadosJson = $dadosJson;
        return $this;
    }

    public function salvarFirebase()
    {
        $table = curl_init($this->firebaseUrl . 'funcionario.json');
        curl_setopt($table, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($table, CURLOPT_POSTFIELDS, $this->dadosJson);
        curl_setopt($table, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($table);
        curl_close($table);
        return $response;
    }
}
