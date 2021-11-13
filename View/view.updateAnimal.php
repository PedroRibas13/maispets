<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php 
include '../template/referencias.factory.php';
include '..\controller\controller.login.php';
include "..\model\connection.php";
include "..\model\animal.factory.php"; 
$animal = new animal();
$idAnimal = $_GET['cd_animal'];
$animal->edit_bd($idAnimal);
if(isset($animal)){

}
else{
        echo 'Não pertence a você amigão.';
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atualizar | +Pets</title>
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
                        }

                        if($_SESSION['tipo'] == 'Usuario')
                        {
                            menuU(); 
                        }
                        if($_SESSION['tipo'] == 'Instituicao')
                        {
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
                        <h2>Atualize as informações de <?php echo $animal->nome; ?>.</h2>
                    </header>
                    <form class="form-horizontal" action="..\Controller\controller.updateANI.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                        <input name="idAnimal" type="hidden" value="<?php echo $animal->idAnimal;?>">
                        <input name="img_anterior" type="hidden" readonly value="<?php echo $animal->img_name;?>">
                        <div class="form-group col-md-12">
                            <header>Escolher uma foto<span style="color: red;">*</span></header>
                            <small>JPG, JPEG, PNG ou GIF</small>
                            <div class="custom-file">                                                                       
                                <input type="file" class="custom-file-input" name="img_name" id="img_name" onchange="previewImage()"><br><br>
                                <label class="custom-file-label">Selecionar Imagem</label>
                                <img class='img-prev' style="vertical-align:unset;" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome"  max="50" value='<?php echo $animal->nome; ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ano de Nascimento (aproximadamente):</label>
                                <input type="number" class="form-control" name="nascimento" min="2000" max="2020" value='<?php echo $animal->idadeNum; ?>'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-center">Sexo<span style="color: red;">*</span></label><br><br>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="sexo" value="0" <?php if($animal->sexo == 'Fêmea') echo 'checked';?>> Fêmea &nbsp;
                                <input type="radio" name="sexo" value="1" <?php if($animal->sexo == 'Macho') echo 'checked';?>> Macho<br><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Especie<span style="color: red;">*</span></label>
                                <select class="form-control" name="especie" required>
                                    <option value="1" <?php if($animal->especie == 'Cachorro') echo 'selected';?>>Cachorro</option>
                                    <option value="2" <?php if($animal->especie == 'Gato') echo 'selected';?>>Gato</option>
                                    <option value="3" <?php if($animal->especie == 'Ave') echo 'selected';?>>Avê</option>
                                    <option value="4" <?php if($animal->especie == 'Roedor') echo 'selected';?>>Roedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Porte:</label>
                                <select class="form-control" name="porte">
                                    <option value="1" <?php if($animal->porte == 'Pequeno') echo 'selected';?>>Pequeno</option>
                                    <option value="2" <?php if($animal->porte == 'Medio') echo 'selected';?>>Médio</option>
                                    <option value="3" <?php if($animal->porte == 'Grande') echo 'selected';?>>Grande</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Informações adicionais </label> <br>
                            <small>(Max. 500 caracteres) </small>
                            <textarea class="form-control" name="info" rows="6" maxlength="500"><?php echo $animal->info ?></textarea>
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
                    <header class='text-center'><h2>Animal já foi adotado?</h2></header>
                    <div class="alert alert-success">
                    <form class="form-horizontal" action="..\Controller\controller.adotadoANI.php" method="GET">
                        <div class="form-group">
                            <input type='checkbox' name='confirmAdotado' id='confirmAdotado'>&nbsp;&nbsp;Sim, ele já foi adotado.
                            <input name="idAnimal" type="hidden" readonly value="<?php echo $animal->idAnimal;?>">
                            <hr>
                            <button id="excluirAnimal" type="submit" class="btn btn-info btn-block">Animal já adotado</button>
                        </div>
                    </form>
                    </div>
                    <hr>
                    <header class='text-center'><h2>Excluir registro</h2></header>
                    <div class="alert alert-danger">
                        <p>Ao continuar, o cadastro do animal será desativado e então não podera mais ser visto por mais ninguem.Você tem certeza que deseja prosseguir?</p>
                    
                    <form class="form-horizontal" action="..\Controller\controller.deletANI.php" method="GET">
                        <div class="form-group">
                            <input type='checkbox' name='confirmado' id='confirmado'>&nbsp;&nbsp;Sim, estou ciente e quero continuar.
                            <input name="idAnimal" type="hidden" readonly value="<?php echo $animal->idAnimal;?>">
                            <hr>
                            <button id="excluirAnimal" type="submit" class="btn btn-danger btn-block">Excluir registro</button>
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