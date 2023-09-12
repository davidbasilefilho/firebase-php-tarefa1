<?php
class Categoria
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
        $tabela = curl_init($this->firebaseUrl . 'categoria.json');
        curl_setopt($tabela, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($tabela, CURLOPT_POSTFIELDS, $this->dadosJson);
        curl_setopt($tabela, CURLOPT_RETURNTRANSFER, true);
        $resposta = curl_exec($tabela);
        curl_close($tabela);
        return $resposta;
    }
}
