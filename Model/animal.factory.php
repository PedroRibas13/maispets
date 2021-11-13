<meta charset="UTF-8">
<html lang="pt-br">

<?php
date_default_timezone_set('America/Sao_Paulo');
    class animal
    {
        function __construct()
        {
            $this->con = $GLOBALS["con"];
        }
        public $idDonoUsu;
        public $idDonoInst;

        public $idAnimal;
        public $nome;
        public $sexo;
        public $info;
        public $nascimento;
        public $porte;
        public $especie;
        public $cidade;
        public $vacina;
        public $castrado;
        public $especial;
        public $situacao;
        public $img_path;

        function edit_bd($idAnimal){
            $sql = "SELECT a.cd_animal, a.nm_animal, a.ic_macho_femea, a.ds_info_adicional, a.dt_nascimento, 
                           a.cd_usuario, a.cd_instituicao, a.ic_ativo_inativo, a.img_name, e.nm_especie, p.nm_porte
            FROM tb_animal AS a JOIN tb_porte AS p, tb_especie AS e,
                 tb_usuario as u, tb_instituicao as i, tb_cidade as c
            WHERE a.cd_animal = " . $idAnimal . " AND a.cd_especie = e.cd_especie AND a.cd_cidade = c.cd_cidade 
            AND a.cd_porte = p.cd_porte AND a.ic_ativo_inativo = 1 AND a.cd_".$_SESSION['tipo']. '=' . $_SESSION['id']."";            
            $query = $this->con->query($sql);
            $res=$query->fetch_object();
            if($res != null){
                $this->idAnimal=$res->cd_animal;
                $this->nome=$res->nm_animal;
                $this->sexo=$res->ic_macho_femea;
                $this->info=$res->ds_info_adicional;
                $this->idadeNum=$res->dt_nascimento;
                $this->idade=$res->dt_nascimento;
                $this->porte=$res->nm_porte;
                $this->especie=$res->nm_especie;
                $this->cidade=$res->nm_cidade;
                $this->idade = 2020-$this->idade=$res->dt_nascimento . 'ano(s)';
                $this->situacao = $res->ic_ativo_inativo;
                $this->img_name = $res->img_name;
                $this->idDonoUsu = $res->cd_usuario;           
                if($this->idade == 0){
                    $this->idade="menos de 1 ano";
                }
                if($this->info=$res->ds_info_adicional == ''){
                    $this->info = 'Nenhuma informação adicional :(';
                }
                else{
                    $this->info=$res->ds_info_adicional;
                }
                if($this->sexo=$res->ic_macho_femea == 0){
                    $this->sexo = 'Fêmea';
                }
                else{
                    $this->sexo= 'Macho';
                }                
            }
            else{
                header("Location: ../view/view.listaAnimal.php");
            }
        }
        
        function addUSU($nome, $sexo, $info, $nascimento, $porte, $especie, $cidade, $castracao, $especial, $idDonoUsu, $img){
            if($nome == "")
            {
                $nome = "Não tem nome.";
            }

            $sql = "INSERT INTO tb_animal(nm_animal, ic_macho_femea, ds_info_adicional, dt_nascimento, cd_porte, ic_ativo_inativo, cd_especie, ic_castrado, ic_animal_especial, cd_usuario, img_name)". 
            "VALUES ('$nome', '$sexo', '$info', '$nascimento', '$porte', 1,'$especie', '$castracao', '$especial', '$idDonoUsu', '$img')";
            return $this->con->query($sql);
        }

        function addONG($nome, $sexo, $info, $nascimento, $porte, $especie, $idDonoInst, $img){
            if($nome == "")
            {
                $nome = "Não tem nome.";
            }

            $sql = "INSERT INTO tb_animal(nm_animal, ic_macho_femea, ds_info_adicional, dt_nascimento, cd_porte, ic_ativo_inativo, cd_especie, cd_instituicao, img_name)".
             "VALUES ('$nome', '$sexo', '$info', '$nascimento', '$porte', 1,'$especie', '$idDonoInst', '$img')";
            return $this->con->query($sql);
        }

        function edit($idAnimal, $nome, $idade, $sexo, $especie, $porte, $info, $img){
            if($nome == "")
            {
                $nome = "Não tem nome.";
            }

            $sql = "UPDATE tb_animal SET nm_animal = '$nome', dt_nascimento = '$idade', ic_macho_femea = '$sexo', cd_especie = '$especie', cd_porte = '$porte', ds_info_adicional = '$info', img_name = '$img' WHERE cd_animal = '$idAnimal'";
            return $this->con->query($sql);
        }

        function delete($idAnimal){
            $sql = "UPDATE tb_animal SET ic_ativo_inativo = 0 WHERE cd_animal= '$idAnimal'";
            return $this->con->query($sql);
        }
        function adotado($idAnimal){
            $sql = "UPDATE tb_animal SET ic_ativo_inativo = 0, ic_adotado = 1 WHERE cd_animal= '$idAnimal'";
            return $this->con->query($sql);
        }

        function view($idAnimal){
            $hoje = getdate();
            $ano = $hoje['year'];

            $con = $GLOBALS["con"];
            $sql = "SELECT a.nm_animal, a.ic_macho_femea, a.ds_info_adicional, a.dt_nascimento, 
                    a.ic_ativo_inativo, a.img_name, a.ic_castrado, a.ic_animal_especial, e.nm_especie, p.nm_porte, a.cd_cidade
                    FROM tb_animal AS a JOIN tb_porte AS p, tb_especie AS e
                    WHERE a.cd_animal = '$idAnimal' AND a.cd_especie = e.cd_especie
                    AND a.cd_porte = p.cd_porte AND a.ic_ativo_inativo = 1";
            $query = $con->query($sql);
            if($row = mysqli_num_rows($query) == 1){
                $res=$query->fetch_object();            
                $this->nome=$res->nm_animal;
                $this->sexo=$res->ic_macho_femea;
                $this->info=$res->ds_info_adicional;
                $this->idade=$res->dt_nascimento;
                $this->porte=$res->nm_porte;
                $this->castrado=$res->ic_castrado;
                $this->especial=$res->ic_animal_especial;
                $this->especie=$res->nm_especie;

                if($this->cidade=$res->cd_cidade == '1'){
                    $this->cidade=$res->cd_cidade = "Santos";
                }
                else{
                    if($this->cidade=$res->cd_cidade == '2'){
                        $this->cidade=$res->cd_cidade = "São Vicente";
                    }
                }

                $this->cidade=$res->cd_cidade;
                $this->idade = $ano - $this->idade=$res->dt_nascimento . 'ano(s)';
                $this->img_path = '../template/img/animal_img/' . $res->img_name;
            
                if($this->idade == 0){
                    $this->idade="menos de 1 ano";
                }

                if($info=$res->ds_info_adicional == ''){
                    $this->info = 'Nenhuma informação adicional :(';
                }
                else{
                    $this->info=$res->ds_info_adicional;
                }

                if($this->sexo=$res->ic_macho_femea == 0){
                    $this->sexo = 'Fêmea';
                }
                else{
                    $this->sexo= 'Macho';
                }
            }
            else{
                header("Location: index.php");
            }
        }
    }

    function viewOwner()
    {
        $con = $GLOBALS["con"];
        if($_SESSION['tipo'] == 'Usuario'){
        $sql = 
        "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ds_info_adicional, a.ic_macho_femea, a.img_name,
        a.cd_usuario, p.nm_porte, e.nm_especie
        FROM tb_animal as a
        JOIN tb_porte AS p, tb_especie as e
        WHERE a.cd_usuario = ".$_SESSION['id']." AND a.cd_porte = p.cd_porte AND a.cd_especie = e.cd_especie AND a.ic_ativo_inativo = 1 order by a.cd_animal, e.nm_especie asc";
        }
        else
        {
        $sql = 
        "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ds_info_adicional, a.ic_macho_femea, a.img_name,
        a.cd_instituicao, p.nm_porte, e.nm_especie
        FROM tb_animal as a JOIN tb_porte AS p, tb_especie as e
        WHERE a.cd_instituicao = ".$_SESSION['id']." AND a.cd_porte = p.cd_porte AND a.cd_especie = e.cd_especie AND a.ic_ativo_inativo = 1 order by a.cd_animal, e.nm_especie asc";
        }        
        $query = $con->query($sql);
        echo "<header><h3 class='text-center'>Animai(s) cadastrado(s).</h3></header>";
        if($row = mysqli_num_rows($query) >= 1){
            while($sql=$query->fetch_array())
            {
                $idAnimal=$sql["cd_animal"];
                $nome = $sql["nm_animal"];
                $porte = $sql["nm_porte"];
                $especie = $sql["nm_especie"];
                $sexo = $sql["ic_macho_femea"];
                $idade = 2020 - $sql["dt_nascimento"] . ' Ano(s).';
                $img_path =$sql["img_name"];
                if($img_path == ''){
                    $img_path = '4devs_gerador_imagem.jpg';
                }
                $info = $sql["ds_info_adicional"];
                if($info == null){
                    $info = "Nenhuma informação adicional";
                }
                if($sexo == 0)
                {
                $sexo = 'Fêmea';
                }
                else{
                $sexo = 'Macho'; 
                }
                if($idade <= 0){
                    $idade = 'Menos de 1 ano.';
                }
               
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
                                    <p class='card-text'>Info. Adicional:<br> ". $info."<br></p>
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
                                    <a href='../view/view.updateAnimal.php?cd_animal=".$idAnimal."'>
                                        <button class='btn bg-button'>Editar &nbsp <span class='ti-pencil'></span></button>
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
            echo "<div class='alert alert-dark col-md-12 col-sm-12' role='alert'><br><h4 class='text-center'>Nenhum animal cadastrado ainda.</h4><br></div>";
        }
    }

    function viewRelatorio()
    {
        $con = $GLOBALS["con"];
        if($_SESSION['tipo'] == 'Usuario'){
        $sql = 
        "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ds_info_adicional, a.ic_macho_femea, a.img_name,
        a.cd_usuario, p.nm_porte, e.nm_especie
        FROM tb_animal as a
        JOIN tb_porte AS p, tb_especie as e
        WHERE a.cd_usuario = ".$_SESSION['id']." AND a.cd_porte = p.cd_porte AND a.cd_especie = e.cd_especie AND a.ic_ativo_inativo = 0 AND a.ic_adotado = 1 order by a.cd_animal, e.nm_especie asc";
        }
        else
        {
        $sql = 
        "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ds_info_adicional, a.ic_macho_femea, a.img_name,
        a.cd_instituicao, p.nm_porte, e.nm_especie
        FROM tb_animal as a JOIN tb_porte AS p, tb_especie as e
        WHERE a.cd_instituicao = ".$_SESSION['id']." AND a.cd_porte = p.cd_porte AND a.cd_especie = e.cd_especie AND a.ic_ativo_inativo = 0 AND a.ic_adotado = 1 order by a.cd_animal, e.nm_especie asc";
        }
        
        $query = $con->query($sql);
        echo "<header><h3 class='text-center'>Animai(s) que já foram adotado(s).</h3></header>";
        if($row = mysqli_num_rows($query) >= 1){
            while($sql=$query->fetch_array())
            {
                $idAnimal=$sql["cd_animal"];
                $nome = $sql["nm_animal"];
                $porte = $sql["nm_porte"];
                $especie = $sql["nm_especie"];
                $sexo = $sql["ic_macho_femea"];
                $idade = 2020 - $sql["dt_nascimento"] . ' Ano(s).';
                $img_path =$sql["img_name"];
                if($img_path == ''){
                    $img_path = '4devs_gerador_imagem.jpg';
                }
                $info = $sql["ds_info_adicional"];
                if($info == null){
                    $info = "Nenhuma informação adicional";
                }
                if($sexo == 0)
                {
                $sexo = 'Fêmea';
                }
                else{
                $sexo = 'Macho'; 
                }
                if($idade <= 0){
                    $idade = 'Menos de 1 ano.';
                }
                
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
                            <br>
                        </div>
                    </div>";
            }
        }
        else{
            echo "<div class='alert alert-dark col-md-12 col-sm-12' role='alert'><br><h4 class='text-center'>Nenhum animal que já tenha sido adotado ainda.</h4><br></div>";
        }
    }

    
?>