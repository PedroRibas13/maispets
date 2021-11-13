<!DOCTYPE html>
<html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../model/connection.php'; include '../model/evento.factory.php'; include '../template/referencias.factory.php';?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eventos | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<?php
include '../controller/controller.login.php';
?>
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->
    <!--Inicio Body -->
    <div class="container">
        <div class="row">
            <br>
            <div class="col-12">
                <header class='text-center'>
                    <span class="text-center"><h1>Lista de Eventos</h1></span>
                    <hr>
                </header>
            </div>
            <div class="card-deck">
                <?php eventoUsu(); ?>
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>