<!DOCTYPE html>
<html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../template/referencias.factory.php'; include '..\Controller\controller.login.php'; 
if (isset($_SESSION['nome'])) {
    header('Location: ../view/view.listaAnimal.php');
}
else{
    ?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->
    <!--Inicio Body -->
    <div class="container-fluid">
        <div class="section">
            <div class="row">
                <div class="col-md-6">
                    <img src="../template/img/fundo1.jpg" class="img-fluid">
                </div>
                <div class="col-md-5 loginBorder">
                    <form class="form-horizontal" method="post" action="../controller/controller.login.php">
                        <div class="form-group">
                            <label for="nome_usuario">E-mail:</label>
                            <input type="email" class="form-control" name="login" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="check" />
                                <span>Mantenha-me conectado</span>
                            </label>
                            <br>Você ainda não é cadastrado? <a href="cadastro.php">Clique aqui</a>
                        </div>
                        <button type="submit" class="btn btn-info">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php footer();?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>
<?php }?>