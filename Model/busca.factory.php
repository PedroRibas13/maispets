<?php
header("Content-Type: text/html; charset=ISO-88-59-1", true);
date_default_timezone_set('America/Sao_Paulo');
include '..\model\connection.php';

if(isset($_POST['porte_id']) || isset($_POST['especie_id']) || isset($_POST['sexo_i']) || isset($_POST['regiao_id'])){
    buscaCompleta();
}

function buscaCompleta(){
    $con = $GLOBALS['con'];
    $sexo = $_POST['sexo_i'];
    $porte = $_POST['porte_id'];
    $especie = $_POST['especie_id'];
    $regiao = $_POST['regiao_id'];

    if($sexo !=''){
        $sexo = ' AND a.ic_macho_femea = ' . $sexo;
    }
    if($porte != ''){
        $porte = ' AND a.cd_porte = ' . $porte;
    }
    if($especie != ''){
        $especie = ' AND a.cd_especie = ' . $especie;
    }
    if($regiao != ''){
        $regiao = ' AND a.cd_cidade = ' . $regiao;
    }

    $sql =  
    "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ic_ativo_inativo,
            a.ic_macho_femea, a.img_name
    FROM tb_animal AS a
    WHERE a.ic_ativo_inativo = 1 " . $porte . $especie . $sexo . $regiao;
    $procura = mysqli_query($con, $sql);
    $cont = mysqli_num_rows($procura);
    if($cont > 0){
        $query = $con->query($sql);
        while($sql=$query->fetch_array())
        {
            $id = $sql["cd_animal"];
            $nome = $sql["nm_animal"];
            $sexo = $sql["ic_macho_femea"];
            $img_path = '../template/img/animal_img/' . $sql["img_name"];

            if($sexo == 0)
            {
            $sexo = "&nbsp<span class='float-right fa fa-venus'></span>";
            }
            else{
            $sexo = "&nbsp<span class='float-right fa fa-mars'></span>"; 
            }
            echo "
                <div class='col-lg-4 col-md-6 col-sm-12' id='".$id."'>
                    <div class='card animal-card'>
                        <img src='". $img_path ."' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $nome. $sexo."</h5>
                            <br>
                            <a href='view.detalheAnimal.php?cd_animal=".$id."'>
                            <button class='btn bg-button'>Ver sobre&nbsp <span class='ti-zoom-in'></span></button>
                            </a>
                        </div>
                    </div><hr>
                </div>";
        }
    }
    else{
        echo '<div class="text-center">';
        echo '<h4 class="text-center"> Nenhum animal encontrado nos nossos registos.  😞 </h4>';
        echo '</div>';
    }
}
?>