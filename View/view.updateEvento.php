<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php 
include '../template/referencias.factory.php';
include '..\controller\controller.login.php';
include '..\model\connection.php'; 
include '..\model\evento.factory.php';
$evento = new evento();
$idEvento = $_GET['cd_divulgacao'];
$evento->edit_bd($idEvento);
$hoje = getdate();
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar evento | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<?php
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
                if($_SESSION['tipo']="Instituicao")
                {
                menuI();
                }
                ?>
                </ul>
            </div>
        </div>
        <div class="col-md-1"></div>

        <!--Inicio Formulario-->
        <div class="col-md-6" id="cont-border">
            <div class="section">
                <header class='text-center'><h2>Atualize as informações do Evento</h2></header>
                <form class="form-horizontal cont-border" action="../controller/controller.updateEvento.php" method="GET">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input name="idEvento" type="hidden" readonly value="<?php echo $evento->idEvento;?>">
                            <div class="form-group">
                                <label>Titulo: </label>
                                <input type="text" class="form-control" name="titulo" value="<?php echo $evento->titulo?>"  maxlength="50">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Selecione o tipo de evento:</label>
                                <select class="form-control" name="tipo">
                                    <option value="1" <?php if($evento->tipo == 'Feira')      { echo 'selected';}?>>Feira</option>
                                    <option value="2" <?php if($evento->tipo == 'Arrecadacao'){ echo 'selected';}?>>Arrecadação</option>
                                    <option value="3" <?php if($evento->tipo == 'Bazar')      { echo 'selected';}?>>Bazar</option>
                                    <option value="4" <?php if($evento->tipo == 'Quermesse')  { echo 'selected';}?>>Quermesse</option>
                                    <option value="5" <?php if($evento->tipo == 'Festa')      { echo 'selected';}?>>Festa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Data do evento:</label>
                                <input type="date" class="form-control" name="data" min="<?php getDataMin()?>" max="<?php getDataMax()?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Hora de inicio:</label>
                                <input type="time" class="form-control" name="hrinicio" value="<?php echo $evento->hrinicio?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Hora de termino:</label>
                                <input type="time" class="form-control" name="hrtermino" value="<?php echo $evento->hrtermino?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <header class="font-weight-bold">Escolher uma foto<span style="color: red;">*</span></header>
                            <small>JPG, JPEG ou PNG</small>
                            <div class="custom-file">                                                                       
                                <input type="file" class="custom-file-input" name="img_name" id="img_name" required onchange="previewImage()"><br><br>
                                <label class="custom-file-label">Selecionar Imagem</label>
                                <img class='img-prev' style="vertical-align:unset;" />
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-sm btn-block" > Concluir</button>&nbsp;
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-sm btn-block" > Cancelar </button>
                        </div>
                    </div>
                </form>
                <hr>
                <header class='text-center'><h2>Excluir evento</h2></header>
                <div class="alert alert-danger">
                    <p>Ao continuar, o evento será desativado e então não podera mais ser visto por mais ninguem.Você tem certeza que deseja prosseguir?</p>
                
                
                <form class="form-horizontal cont-border" action="..\Controller\controller.deletEvento.php" method="GET">
                    <div class="form-group">
                    <input type='checkbox' name='confirmado' id='confirmado'>&nbsp;&nbsp;Sim, estou ciente e quero continuar.
                    <input name="idEvento" type="hidden" readonly value="<?php echo $evento->idEvento;?>">
                    <hr>
                    <button id="excluirAnimal" type="submit" class="btn btn-danger btn-block">Excluir evento</button>
                    </div>
                </form>
                </div>
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