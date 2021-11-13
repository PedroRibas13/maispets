<meta charset="UTF-8">

<?php 
    function viewUSU(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM tb_usuario";
        $query = $con->query($sql);
        echo '<p>Registros encontrados: '.$query->num_rows.'</p>';
        while($sql = $query->fetch_array()){
            $idUsuario = $sql["cd_usuario"];
            $nome= $sql["nm_usuario"];
            $email= $sql["ds_email"];
            $senha= $sql["ds_senha"];            
            $nascimento= $sql["dt_nascimento"];
            $celular= $sql["ds_celular"];
            $info= $sql["ds_info_adicional"];
            $situacao= $sql["ic_ativo_inativo"];     
            $img_name = $sql["img_name"];         
            echo "<br/><tr>
            <td>$idUsuario   |</td>
            <td>$nome   |</td>
            <td>$email   |</td>
            <td>$senha   |</td>
            <td>$nascimento   |</td>
            <td>$celular   |</td>
            <td>$situacao   |</td>
            <td>$info   |</td>
            <td>$img_name</td>
            </tr>";
        }
    }
    class usuario
    {
        
        public $idUsuario;
        public $nome;
        public $email;
        public $senha;
        public $nascimento;
        public $celular;
        public $info;
        public $situacao;
        public $img_name;

        function __construct(){
			$this->con = $GLOBALS["con"];
		}

        function edit_bd($idUsuario)
        {
            $sql = "SELECT * FROM tb_usuario WHERE cd_usuario =" . $idUsuario;
            $query = $this->con->query($sql);
            $res=$query->fetch_object();
            $this->idUsuario=$res->cd_usuario;
            $this->nome=$res->nm_usuario;
            $this->email=$res->ds_email;
            $this->senha=$res->ds_senha;
            $this->nascimento=$res->dt_nascimento;
            $this->celular=$res->ds_celular;
            $this->info=$res->ds_info_adicional;
            $this->situacao=$res->ic_ativo_inativo;
            $this->img_name=$res->img_name;

        }

        function add($nome, $email, $senha, $nascimento, $celular, $info, $img_name)
        {
            $sql = "INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha, dt_nascimento, ds_celular, ds_info_adicional, ic_ativo_inativo, img_name)" . 
            "VALUES ('$nome', '$email', '$senha', '$nascimento', '$celular', '$info', 1, '$img_name')";
            return $this->con->query($sql); 
        }

        function edit($senhaAntiga, $senha, $celular, $info, $id, $img)
        {
            if($senhaAntiga == $_SESSION['senhaAntiga'])
            {
                $sql = "UPDATE tb_usuario SET ds_senha ='$senha', ds_celular ='$celular', ds_info_adicional ='$info', img_name = '$img' WHERE cd_usuario='$id' AND ds_senha='$senhaAntiga'";
                return $this->con->query($sql);
            }
            else{
                echo "<script> alert('Nada foi alterado, senha diferente da cadastrada. Tente novamente.'); window.location.href='../view/view.updateUSU.php'</script>";
            }
            
        }

        function delete($idUsuario)
        {
            $sql = "UPDATE tb_usuario SET ic_ativo_inativo = 0 WHERE cd_usuario = '$idUsuario'";
            return $this->con->query($sql);
        }

        function deleteCascade($idUsu){
            $sql = "UPDATE tb_animal SET ic_ativo_inativo = 0 WHERE cd_usuario = '$idUsu'";
            return $this->con->query($sql);
        }

        function addFav($id, $cd){
            $sql = "INSERT INTO item_favorito (cd_usuario, cd_animal)" . " VALUES ('$id','$cd')";
            return $this->con->query($sql);
        }
        function remFav($id, $cd){
            $sql = "DELETE FROM item_favorito WHERE cd_usuario = '$id' AND cd_animal = '$cd'";
            return $this->con->query($sql);
        }
    }

    function viewFav()
    {
        $con = $GLOBALS["con"];
        if($_SESSION['tipo'] == 'Usuario'){
        $id = $_SESSION['id'];
        $sql =
        "SELECT a.cd_animal, a.nm_animal, a.img_name, a.nm_animal, a.ic_macho_femea, a.dt_nascimento, a.ds_info_adicional, e.nm_especie, p.nm_porte
         FROM item_favorito as i
         JOIN tb_usuario as u, tb_animal as a, tb_especie as e, tb_porte as p
         WHERE i.cd_usuario = u.cd_usuario AND i.cd_animal = a.cd_animal AND a.cd_especie = e.cd_especie AND a.cd_porte = p.cd_porte AND u.cd_usuario = '$id'";
        }
        $query = $con->query($sql);
        $query = $con->query($sql);
        if($row = mysqli_num_rows($query) >= 1){
            while($sql=$query->fetch_array())
            {
                $idAnimal=$sql["cd_animal"];
                $nome = $sql["nm_animal"];
                $especie = $sql["nm_especie"];
                $porte = $sql["nm_porte"];
                $sexo = $sql["ic_macho_femea"];
                $idade = $sql["dt_nascimento"];
                $info = $sql["ds_info_adicional"];
                if($sexo == 1){
                    $sexo = 'Macho';
                }
                else{

                }
                $img_path = $sql["img_name"];
                

                echo 
                "<div class='card'>
                    <div class='card-header' id='cabecalho".$idAnimal."'>
                        <h5 class='mb-0'>
                            <h4>".utf8_encode($nome).", " .$especie."</h4>
                            <button class='btn btn-info' type='button' data-toggle='collapse' data-target='#collapse".$idAnimal."' aria-expanded='false' aria-controls='collapse".$idAnimal."'> <i class='ti-angle-down'></i>
                            </button>
                        </h5>
                    </div>
                    <div id='collapse".$idAnimal."' class='collapse hidden' aria-labelledby='cabecalho1' data-parent='#listaAnimais'>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-6'>
                                    <h5 class='card-title'>".utf8_encode($nome)."</h5>
                                    <p class='card-text'>Porte: " .$porte."<br>
                                    <p class='card-text'>Sexo: " .$sexo."<br>
                                    <p class='card-text'>Idade: ".$idade. "<br>
                                    <p class='card-text'>Info. Adicional:<br> ".utf8_encode($info)."<br></p>
                                </div>
                                <div class='col-6'>
                                    <img src='../template/img/animal_img/". $img_path ."' class='img-fluid img-thumbnail card-img-top' alt='...'>
                                </div>
                                </div>
                            </div>
                            <div class='row'>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class='col-5'>
                                    <a href='view.detalheAnimal.php?cd_animal=".$idAnimal."'>
                                        <button class='btn bg-button'>Ver sobre&nbsp <span class='ti-zoom-in'></span></button>
                                    </a>
                                </div>
                                <br>
                            </div>
                            <br>
                        </div>
                    </div>";
            }
        }
        else{
            echo "<div class='alert alert-dark col-md-12 col-sm-12' role='alert'><br><h4 class='text-center'>Nenhum animal favoritado ainda.</h4><br></div>";
        }
    }
?>