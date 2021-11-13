<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '..\model\connection.php'; include '..\model\evento.factory.php'; include '../template/referencias.factory.php'; 
$hoje = getdate();
$hoje['mday']['mon']['year'];
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar evento | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<?php
include '../controller/controller.login.php';

if ($_SESSION['nome'] == null) {
    header('Location: index.php');
} else {
    ?>
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <br>
                    <?php
                    }
                        menuI();
                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>

            <!--Formulario Evento-->
            <div class="col-md-6" id="cont-border">
                <div class="section">
                    <form class="cont-border" action="../controller/controller.cadastroEvento.php" method="post" enctype="multipart/form-data">
                    <header class='text-center'>
                    <h2>Cadastre um evento que ocorrerá:</h2>
                    <span class="info">(<span style="color: red;">*</span>) Campos de preenchimento obrigatorio</span>
                    </header>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">                             
                            <label class="font-weight-bold">Titulo<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" required name="titulo" minlenght='3'  max="50">
                        </div>                           

                        <div class="form-group col-md-12 col-sm-12">                   
                            <label class="font-weight-bold">Selecione o tipo de evento<span style="color: red;">*</span></label>
                            <select class="form-control" name="idTipo">
                                <option value="1">Feira</option>
                                <option value="2">Arrecadação</option>
                                <option value="3">Bazar</option>
                                <option value="4">Quermesse</option>
                                <option value="5">Festa</option>
                            </select>
                        </div>
                    
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="font-weight-bold">Data do Evento<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" required name="data" min="<?php getDataMin()?>" max="<?php getDataMax()?>">
                        </div>

                        <div class="form-group col-md-4 col-sm-6">
                            <label class="font-weight-bold">Hora de Inicio<span style="color: red;">*</span></label>
                            <input type="time" class="form-control" required name="hrinicio" min="06:00" max="22:59">
                        </div>

                        <div class="form-group col-md-4 col-sm-6">                            
                            <label class="font-weight-bold">Hora de Termino<span style="color: red;">*</span></label>
                            <input type="time" class="form-control" required name="hrtermino" min="06:01" max="22:59">
                        </div>
                    
                        <div class="form-group col-md-12 ">
                            <label class="font-weight-bold">Descrição</label>                            
                            <small> (Max. 500 caracteres) </small><br>
                            <textarea class="form-control" name="descricao" rows="8" maxlength="500"></textarea>
                        </div>

                    
                        <div class="form-group col-md-12 col-sm-12">
                            <header class="font-weight-bold">Escolher uma foto<span style="color: red;">*</span></header>
                            <small>JPG, JPEG ou PNG </small>
                            <div class="custom-file">                                                                       
                                <input type="file" class="custom-file-input" name="img_name" id="img_name"  required onchange="previewImage()"><br><br>
                                <label class="custom-file-label">Selecionar Imagem</label>
                            <img class='img-prev' style="vertical-align:unset;" />
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-info btn-block" > Concluir </button>&nbsp;
                            </div>
                            <div class="col-6">
                                <button type="reset" class="btn btn-danger btn-block" > Cancelar </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!--Fim Formulario-->
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>