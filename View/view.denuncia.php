<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../model/connection.php'; include '../model/animal.factory.php'; include '../template/referencias.factory.php';?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Denúncia | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias -->
<?php
include '../controller/controller.login.php';
?>
<!--Inicio Body -->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <!--Inicio Body-->
    <section>
        <br>
        <div class="text-center">
           <img src="../template/img/denuncia.jpg">
        </div>
        <br>
    </section>
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>