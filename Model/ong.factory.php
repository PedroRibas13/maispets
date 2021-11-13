<meta charset="UTF-8">

<?php 
    function viewONG(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM tb_instituicao";
        $query = $con->query($sql);
        echo '<br><p>Registros encontrados: '.$query->num_rows.'</p>';
        while($sql = $query->fetch_array()){
            $idInst = $sql["cd_instituicao"];
            $nomeRes = $sql["nm_responsavel"];
            $nomeFan = $sql["nm_fantasia"];
            $cnpj = $sql["cd_cnpj"];
            $email = $sql["ds_email"];
            $senha = $sql["ds_senha"];
            $telefone = $sql["ds_telefone"];
            $celular = $sql["ds_celular"];
            $info = $sql["ds_info"];
            $tipo = $sql["ic_negocio_ong"];
            $situacao= $sql["ic_ativo_inativo"];     
            $img_name = $sql["img_name"];         
            echo "<br/><tr>
            <td>$idInst</td>
            <td>$nomeRes</td>
            <td>$nomeFan</td>
            <td>$cnpj</td>
            <td>$email</td>
            <td>$senha</td>
            <td>$telefone</td>
            <td>$celular</td>
            <td>$info</td>
            <td>$tipo</td>
            <td>$situacao</td>
            <td>$img_name</td>
            </tr>";
        }
    }

    class instituicao{

        function __construct(){
			$this->con = $GLOBALS["con"];
		}
        public $idInst;
        public $nomeRes;
        public $nomeFan;
        public $cnpj;
        public $email;
        public $senha;
        public $telefone;
        public $celular;
        public $info;
        public $tipo;
        public $situacao;
        public $img_name;

        function edit_bd($idUsuario)
        {
            $sql = "SELECT * FROM tb_instituicao WHERE cd_instituicao =" . $idUsuario;
            $query = $this->con->query($sql);
            $res=$query->fetch_object();
            $this->idUsuario=$res->cd_instituicao;
            $this->nomeRes=$res->nm_responsavel;
            $this->nomeFan=$res->nm_fantasia;
            $this->cnpj=$res->cd_cnpj;
            $this->email=$res->ds_email;
            $this->senha=$res->ds_senha;
            $this->telefone=$res->ds_telefone;
            $this->celular=$res->ds_celular;
            $this->info=$res->ds_info;
            $this->tipo=$res->ic_negocio_ong;
            $this->situacao=$res->ic_ativo_inativo;
            $this->img_name=$res->img_name;
        }

        function add($nomeRes,$nomeFan,$cnpj,$email,$senha,$telefone,$celular,$info,$tipo, $img_name)
        {
            $sql = "INSERT INTO tb_instituicao (nm_responsavel, nm_fantasia, cd_cnpj, ds_email, ds_senha, ds_telefone, ds_celular, ds_info, ic_negocio_ong, ic_ativo_inativo, img_name)" . 
            "VALUES ('$nomeRes', '$nomeFan', '$cnpj', '$email', '$senha', '$telefone', '$celular', '$info', '$tipo', 1, '$img_name')"; 
            return $this->con->query($sql);
        }

        function edit($senhaAntiga, $senha, $telefone, $celular, $info, $id, $img)
        {
            if($senhaAntiga == $_SESSION['senhaAntiga'])
            {
                $sql = "UPDATE tb_instituicao SET ds_senha='$senha', ds_telefone ='$telefone', ds_celular='$celular', ds_info='$info', img_name='$img' WHERE cd_instituicao='$id' AND ds_senha='$senhaAntiga'";
                return $this->con->query($sql);
            }
            else{
                echo "<script> alert('Nada foi alterado, senha diferente da cadastrada. Tente novamente.'); window.location.href='../view/view.updateONG.php'</script>";
            }
        }

        function delete($id)
        {
            $sql = "UPDATE tb_instituicao SET ic_ativo_inativo = 0 WHERE cd_instituicao = '$id'";
            return $this->con->query($sql);
            echo "<script> alert('Conta desativa, agradecemos pelo tempo que passou com a gente, esperamos te ver novamente.')</script>";
        }
        function deleteCascade($idUsu){
            $sql = "UPDATE tb_animal SET ic_ativo_inativo = 0 WHERE cd_instituicao = '$idUsu'";
            return $this->con->query($sql);
        }
    }
?>