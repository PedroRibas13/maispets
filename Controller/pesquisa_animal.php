<?php
    include "..\model\connection.php";
    include "..\model\animal.factory.php";
    
    $hoje = getdate();
    $especie_id = $_POST['especie_id'];
    $sql =  
    "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ic_ativo_inativo,
            p.nm_porte, a.ic_macho_femea, a.img_name
    FROM tb_animal AS a 
    JOIN tb_porte AS p 
    WHERE a.cd_porte = p.cd_porte AND a.ic_ativo_inativo = 1
    AND a.cd_especie =".' $especie_id '." ORDER BY RAND()";
    $query = mysqli_query($con, $sql);
    while($sql=$query->fetch_array())
        {
            $id = $sql["cd_animal"];
            $nome = $sql["nm_animal"];
            $sexo = $sql["ic_macho_femea"];
            $img_path = '../template/img/animal_img/' . $sql["img_name"];
            $idade = 2020 - $sql["dt_nascimento"] . ' Anos.';
            $porte = $sql["nm_porte"];

            if($sexo == 0)
            {
            $sexo = "&nbsp<span class='float-right fa fa-venus'></span>";
            }
            else{
            $sexo = "&nbsp<span class='float-right fa fa-mars'></span>"; 
            }
            if($idade <= 0){
                $idade = "Menos de 1 ano.";
            }
            echo "
                <div class='col-md-4 col-sm-3' id='".$id."'>
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
?>