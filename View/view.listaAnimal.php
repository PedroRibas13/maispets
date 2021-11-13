<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../model/connection.php'; include '../model/animal.factory.php'; include '../template/referencias.factory.php';?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista Animais | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias -->
<?php
include '../controller/controller.login.php';

if ($_SESSION['nome'] == null) {
    header('Location: index.php');
} else {
    ?>

<!--Inicio Body -->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <!--Inicio Body-->
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
            <div class="col-md-1 d-none d-md-block"></div>
            <div class="col-md-6" >
                <div class="col-md-12" id="cont-border">
                    <br>
                    <div class="accordion" id="listaAnimais">
                        <?php viewOwner(); ?>                    
                    </div>
                </div>
                <hr>
                <div class="col-md-12" id="cont-border">
                    <br>
                    <div class="accordion" id="listaAnimaisR">
                        <?php viewRelatorio(); ?>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>