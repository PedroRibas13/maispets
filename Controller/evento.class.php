<?php 
class evento{
    public $idEvento;
    public $titulo;
    public $descricao;
    public $data;
    public $hrinicio;
    public $hrtermino;
    public $instituicao;
    public $idTipo;
}

function __construct($idEvento, $titulo, $descricao, $data, $hrinicio, $hrtermino, $instituicao, $idTipo){
    $this->idEvento=$idEvento;
    $this->titulo=$titulo;
    $this->descricao=$descricao;
    $this->data=$data;
    $this->hrinicio=$hrinicio;
    $this->hrtermino=$hrtermino;
    $this->instituicao=$instituicao;
    $this->idTipo=$idTipo;
}
?>