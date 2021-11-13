<?php 
class animal{
    public $idDonoUsu;
    public $iddonoInst;

    public $idAnimal;
    public $nome;
    public $sexo;
    public $info;
    public $nascimento;
    public $castracao;
    public $especial;
    public $porte;
    public $especie;
    public $cidade;
    public $vacina;
}

function __construct($idAnimal, $nome, $sexo, $info, $nascimento, $castracao, $especial, $porte, $especie, $cidade, $vacina, $idDonoUsu, $iddonoInst){
    $this->idAnimal=$idAnimal;
    $this->nome=$nome;
    $this->sexo=$sexo;
    $this->info=$info;
    $this->nascimento=$nascimento;
    $this->castracao=$castracao;
    $this->especial=$especial;
    $this->vacina=$vacina;
    $this->porte=$porte;
    $this->especie=$especie;
    $this->cidade=$cidade;
    $this->idDonoUsu=$idDonoUsu;
    $this->idDonoInst=$iddonoInst;
}
?>