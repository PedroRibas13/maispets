<?php
class instituicao{
    public $idInst;
    public $nomeRes;
    public $nomeFan;
    public $cnpj;
    public $email;
    public $senha;
    public $telefone;
    public $celular;
    public $info;
    public $situacao;
    public $img_name;

    function __construct($idInst,$nomeRes,$nomeFan,$cnpj,$email,$senha,$telefone,$celular,$info,$situacao, $img_name){
        $this->idInst=$idInst;
        $this->nomeRes=$nomeRes;
        $this->nomeFan=$nomeFan;
        $this->cnpj=$cnpj;
        $this->email=$email;
        $this->senha=$senha;
        $this->telefone=$telefone;
        $this->celular=$celular;
        $this->info=$info;
        $this->situacao=$situacao;
        $this->img_name=$img_name;
    }
}

class Login{
    public $emailL;
    public $senhaL;
    public $tipoL;
    public $situcaoL;

    function __construct($emailL, $senhaL, $tipoL, $situacaoL){
        $this->emailL=$emailL;
        $this->senhaL=$senhaL;
        $this->tipoL=$tipoL;
        $this->situacao=$situacaoL;
    }

}
?>