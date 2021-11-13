<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php 
include '../template/referencias.factory.php';
include '..\controller\controller.login.php';
include "..\model\connection.php";
include "..\model\ong.factory.php"; 
$inst = new instituicao();
$idInst = $_SESSION['id'];
$inst->edit_bd($idInst);

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Configurações | +Pets</title>
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

    <!--Formulario Atualizar Dados-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <br>
                            <?php
                                menuI();
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6" id="cont-border">
                <br>
                <div class="section">
                    
                    <header class='text-center'>
                        <h2>Atualize suas informações aqui.</h2>
                    </header>
                    <form class="form-horizontal" action="..\Controller\controller.updateONG.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <br>
                            <div class="form-group col-md-12 col-sm-12">
                                <header class="font-weight-bold">Atualizar foto<span style="color: red;">*</span></header>
                                <small>JPG, JPEG ou PNG </small>
                                <div class="custom-file">                                                                       
                                    <input type="file" class="custom-file-input" name="img_name" id="img_name" onchange="previewImage()"><br><br>
                                    <label class="custom-file-label">Selecionar Imagem</label>
                                <img class='img-prev' style="vertical-align:unset;" />
                                </div>
                                <br>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nome do Responsavel</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $inst->nomeRes; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nome Fantasia</label>
                                    <input type="text" class="form-control" name="nomeFant" value="<?php echo $inst->nomeFan; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Senha Antiga<span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" name="senhaAntiga" min="8" maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nova Senha</label>
                                    <input type="password" class="form-control" name="senha" min="8" maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Telefone com DDD</label>
                                    <input type="tel" class="form-control"onkeydown="javascript: fMasc( this, mTel );"  name="telefone" min="15" maxlength="15" value="<?php echo $inst->telefone; ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Celular com DDD</label>
                                    <input type="tel" class="form-control"onkeydown="javascript: fMasc( this, mTel );"  name="celular" min="15" maxlength="15" value="<?php echo $inst->celular; ?>" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Informações Adicionais</label><br>
                                    <small>(Max. 500 caracteres)</small>
                                    <textarea class="form-control" name="info" row="4" maxlength="500"><?php echo $inst->info; ?> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block"><span class="ti-save"></span> Salvar </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger btn-block"><span class="ti-close"></span> Cancelar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <header class='text-center'><h2>Excluir conta</h2></header>
                    <div class="alert alert-danger">
                        <p>Ao continuar, sua conta será desativado e não podera mais ser acessada por você, todos os animais e eventos cadastrados atraves dela também serão desativados.Você tem certeza que deseja prosseguir?</p>
                    
                    <form class="form-horizontal" action="..\Controller\controller.deletONG.php" method="POST">
                        <div class="form-group">
                        <input type='checkbox' name='confirmado' id='confirmado'>&nbsp;&nbsp;Sim, estou ciente e quero continuar.
                        <hr>
                            <button id="excluirConta" type="submit" class="btn btn-danger btn-block">Excluir conta</button>
                        </div>
                    </form>
                    </div>
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