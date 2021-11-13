<?php
class usuario{
	public $idUsuario;
    public $nome;
    public $email;
    public $senha;
    public $nascimento;
    public $celular;
    public $info;
    public $situacao;
    public $img_name;
	
	function __construct($idUsuario, $nome, $email, $senha, $nascimento, $celular,$info, $situacao, $img_name){
		$this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=$senha;
        $this->nascimento=$nascimento;
        $this->telefone=$celular;
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