<meta charset="UTF-8">
<?php
    function viewLoginInst(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM tb_login where nm_tipo = 'Instituicao'";
        $query = $con->query($sql);
        echo '<p>Registros encontrados: ' .$query->num_rows. '</p>';
        while($sql = $query->fetch_array()){
            $emailL = $sql["ds_email"];
            $senhaL = $sql["ds_senha"];
            $tipoL = $sql["nm_tipo"];
            echo"<br><tr>
            <td>$emailL</td>
            <td>$senhaL</td>
            <td>$tipoL</td>
            </tr>";
        }
    }

    function viewLoginUsu(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM tb_login where nm_tipo = 'Usuario'";
        $query = $con->query($sql);
        echo '<p>Registros encontrados: ' .$query->num_rows. '</p>';
        while($sql = $query->fetch_array()){
            $emailL = $sql["ds_email"];
            $senhaL = $sql["ds_senha"];
            $tipoL = $sql["nm_tipo"];
            echo"<br><tr>
            <td>$emailL</td>
            <td>$senhaL</td>
            <td>$tipoL</td>
            </tr>";
        }
    }

    class Login{
        function __construct(){
        $this->con = $GLOBALS["con"];
    }

    public $emailL;
    public $senhaL;
    public $tipoL; 

    function edit_bd($emailL){
        $sql = "SELECT * FROM tb_login WHERE ds_email = ". $emailL;
        $query = $this->con->query($sql);
        $res = $query->fetch_object();
        $this->emailL=$res->ds_email;
        $this->senhaL=$res->ds_senha;
        $this->tipoL=$res->nm_tipo;
    }

    function addU($emailL, $senhaL){
        $sql = "INSERT INTO tb_login (ds_email, ds_senha, nm_tipo, ic_ativo_inativo)" .
        "VALUES ('$emailL', '$senhaL', 'Usuario', 1)";
        return $this->con->query($sql);
    }

    function addI($emailL, $senhaL){
        $sql = "INSERT INTO tb_login (ds_email, ds_senha, nm_tipo, ic_ativo_inativo)" .
        "VALUES ('$emailL', '$senhaL', 'Instituicao', 1)";
        return $this->con->query($sql);
    }

    function editLogin($senhaL, $emailL){
        $sql = "UPDATE tb_login set ds_senha= '$senhaL' WHERE ds_email = '$emailL'";
        return $this->con->query($sql);
    }

    function desactive($idUsuario, $emailL){
        $sql = "UPDATE tb_login set ic_ativo_inativo = 0 WHERE ds_email = '$emailL'";
        return $this->con->query($sql);
    }
}
?>