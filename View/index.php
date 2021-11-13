<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php 
include '..\model\connection.php';
include '..\model\animal.factory.php';
include '../template/referencias.factory.php'; 
include '..\controller\controller.login.php'; ?>

<head>
   <title> Home | +Pets</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
    <script>
    $(document).ready(function(){
        $('select').on('change', function(){
            var porteID = $('#porte').val();
            var especieID = $('#especie').val();
            var sexo = $('#sexo').val();
            var regiaoID = $('#regiao').val();
            if(porteID != '0' || especieID != '0' || sexo != 'n' || regiaoID != '0'){
                $.ajax({
                    type: 'POST',
                    url: '../Model/busca.factory.php',
                    data: {'porte_id': porteID, 'especie_id': especieID, 'sexo_i': sexo, 'regiao_id': regiaoID},
                    success:function(html){
                        $('.result-bar').html(html);
                    }
                });
            }
        });
    });
    </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<body>
    <!--NavBar-->
    <?php navbar();?>
    <!--NavBar-->
    <!-- Pitch -->
    <section id="intro">
        <div class="intro-container wow fadeIn">
        <h1 class="mb-4 pb-0"> <span>+Pets</span> em lares, do que nas ruas!</h1>
        <h6 class="mb-4 pb-0"> Veja nosso pitch abaixo </h6>
        <a href="https://youtu.be/B9RXj1NljMI" target="_blank" class="venobox play-btn mb-4" data-vbtype="video"
            data-autoplay="true"></a>
        </div>
    </section>
    <!-- Fim Pitch -->
    <!-- -->
    <div class="container ">
    <br><br><br>
    <h3 class="text-center">Animais para Adoção</h3>
    <br>

    <!--Barra de Busca Avançada-->
    <div class="container">
        <br>
        <div class="row bg-costumS">
            <div class="form-group col-md-3 col-sm-12"><br>
                <label for="selectPorte"> Portes</label>
                <select id="porte" name="porte" class="form-control">
                    <option value=""> Todos os portes </option>
                    <option value="1"> Pequeno </option>
                    <option value="2"> Médio </option>
                    <option value="3"> Grande </option>
                </select><br>
            </div>
            <div class="form-group col-md-3 col-sm-12"><br>
                <label for="selectEspecie"> Espécies</label>
                <select id="especie" name="especie" class="form-control">
                    <option value=""> Todas as espécies </option>
                    <option value="1"> Cachorros </option>
                    <option value="2"> Gatos </option>
                    <option value="3"> Aves </option>
                    <option value="4"> Roedores </option>
                    <option value="5"> Tartarugas </option>
                </select><br>
            </div>
            <div class="form-group col-md-3 col-sm-12"><br>
                <label for="selectSexo"> Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option value=""> Ambos </option>
                    <option value="1"> Macho </option>
                    <option value="0"> Fêmea </option>
                </select><br>
            </div>
            <div class="form-group col-md-3"><br>
                <label for="selectRegiao"> Região</label>
                <select id="regiao" name="regiao" class="form-control">
                    <option value=""> Ambos </option>
                    <option value="1"> Santos </option>
                    <option value="2"> São Vicente </option>
                </select><br>
            </div>
        </div>
        <br>
    </div>
    <br>
    <!--Fim Barra de Busca Avançada-->
    

    <!-- Lista de animais -->
    <div class="container">
        <div class="row result-bar">
                <?php
                    $con = $GLOBALS["con"];
                    $sql =  
                    "SELECT a.cd_animal, a.nm_animal, a.dt_nascimento, a.ic_ativo_inativo,
                            a.ic_macho_femea, a.img_name
                    FROM tb_animal AS a 
                    WHERE a.ic_ativo_inativo = 1
                    ORDER BY RAND()";
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
                                        <h5 class='card-title'>" . utf8_encode($nome). $sexo."</h5>
                                        <br>
                                        <a href='view.detalheAnimal.php?cd_animal=".$id."'>
                                        <button class='btn bg-button'>Ver sobre&nbsp <span class='ti-zoom-in'></span></button>
                                        </a>
                                    </div>
                                </div><hr>
                            </div>";
                    }
                ?>
        </div>
    </div>
    <!-- Fim lista -->
    <br><hr><br>
    <!-- Informações +Pets-->
    <h1 class="text-center">Sobre a plataforma +Pets.</h1>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <br>
            <img src="" class="mx-auto d-block img-fluid" />
            <br>
            <h3>Adotantes</h3>
            <p>Podem procurar por uma lista de animais cadastrados e pelo pet
            ideal, utilizando diferentes filtragens.</p>
        </div>
        <div class="col-md-4 col-sm-12">
            <br>
            <img src="" class="mx-auto d-block img-fluid" />
            <br>
            <h3>Objetivo</h3>
            <p>É ser uma ponte de comunicação entre doadores, adotantes e
            ONGs, facilitando a procura de animais e visando reduzir o número de abandono dos mesmos.</p>
        </div>
        <div class="col-md-4 col-sm-12">
            <br>
            <img src="" class="mx-auto d-block img-fluid" />
            <br>
            <h3>Doadores</h3>
            <p>Podem registrar seu(s) animalzinho(s), colocando as
            características e uma descrição dele(s).</p>
        </div>
    </div>
       
    </div>
    
    </div>
    <br><br>
    <!--Fim Informações-->
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>