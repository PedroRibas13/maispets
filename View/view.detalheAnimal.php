<!DOCTYPE html>
<html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../template/referencias.factory.php'; include "..\model\connection.php"; include "..\model\animal.factory.php";
    $ani = new animal();
    $idAnimal = $_GET['cd_animal'];
    $ani->view($idAnimal);
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo utf8_encode($ani->nome); ?> | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
</head>
<!--Fim Referencias-->
<?php
include '../controller/controller.login.php';
?>
<!--Inicio Body-->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->
    <!--Inicio Body -->
    <div class="container-fluid">
        <div class="section">
            <div class="row  bg-light">
                <div class="col-md-6">
                    <h1 class="text-uppercase font-weight-bolder ">
                    <?php 
                        echo utf8_encode($ani->nome) . '&nbsp'; 
                        if($ani->sexo == 'Fêmea'){ 
                            echo "<span class='fa fa-venus'></span>"; 
                        } 
                        else{ 
                            echo "<span class='text-right fa fa-mars'></span>"; 
                        }
                    ?>
                    </h1>     
                    <br>               
                    <p class='card-text'><span class='ti-angle-double-right'></span> Especie:<?php echo "  ". $ani->especie;?></p>                    
                    <p class='card-text'><span class='ti-angle-double-right'></span> Idade:<?php echo "  ". $ani->idade. " ano(s)."; ?></p>
                    <p class='card-text'><span class='ti-angle-double-right'></span> Porte:<?php echo "  ". $ani->porte; ?></p>
                    <p class='card-text'><span class='ti-angle-double-right'></span> Onde está localizado:<?php echo "  ". $ani->cidade; ?></p>
                    <p class='card-text'><span class='ti-angle-double-right'></span> Castado:<?php if($ani->castrado == '0'){echo "  Não é castrado.";} if($ani->castrado == '1'){echo "  É castrado.";} if($ani->castrado == '2'){echo "  Não soube informar.";} ?></p>
                    <p class='card-text'><span class='ti-angle-double-right'></span> Especial:<?php if($ani->castrado == '0'){echo "  Não é Especial.";}if($ani->castrado == '1'){echo "  É especial.";}if($ani->castrado == '2'){echo "  Não soube informar.";} ?></p>
                    <br>

                    <?php
                    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Usuario')
                    {
                        
                        dono();                        
                        echo "<hr>";
                        
                    }
                   
                    function ver(){
                        $con = $GLOBALS['con'];
                        $sql = "SELECT cd_usuario, cd_animal FROM item_favorito WHERE cd_usuario = ". $_SESSION['id']. " AND cd_animal = ". $_GET['cd_animal'];
                        $procura = mysqli_query($con, $sql);
                        $checa_usuario = mysqli_num_rows($procura);
                        if($checa_usuario == 0){
                        echo "
                        <form method='POST' action='../controller/controller.addFav.php'>
                            <input type='hidden' readonly name='idUSU' value=". $_SESSION['id']. ">
                            <input type='hidden' readonly name='idANI' value=". $_GET['cd_animal'] . ">
                            <button class='btn bt-custom'>Adore o animalzinho&nbsp<span class='ti-heart'></span></button>
                        </form>
                        ";
                        }
                        else{
                        echo "
                        <form method='POST' action='../controller/controller.remFav.php'>
                            <input type='hidden' readonly name='idUSU' value=". $_SESSION['id']. ">
                            <input type='hidden' readonly name='idANI' value=". $_GET['cd_animal'] . ">
                            <button class='btn bt-custom'>Desfavoritar o animalzinho&nbsp<span class='fa fa-heart' style='color:red;'></span></button>
                        </form>
                        ";
                        }
                    }

                    function dono(){
                        $con = $GLOBALS['con'];
                        $sql = "SELECT u.nm_usuario, u.ds_celular FROM tb_usuario as u JOIN tb_animal as a WHERE u.cd_usuario = a.cd_usuario AND u.cd_usuario <> ".$_SESSION['id']." AND a.cd_animal = ". $_GET['cd_animal'];
                        $query = $con->query($sql);
                        if($row = mysqli_num_rows($query) >= 1)
                        {
                            while($sql=$query->fetch_array())
                            {
                                $nome = $sql['nm_usuario'];
                                $cel = $sql['ds_celular'];
                                echo "<hr>";
                                echo "<h4><header>Informações do Tutor:</header></h4>";
                                echo "<p>Nome do Tutor: ". $nome ."</p>";
                                echo "<p>Telefone: ".$cel."</p>";
                                ver();
                            }
                        }else{
                            $sql = "SELECT i.nm_responsavel, i.nm_fantasia, i.ds_celular, i.ds_telefone FROM tb_instituicao as i JOIN tb_animal as a WHERE i.cd_instituicao = a.cd_instituicao AND a.cd_animal = ". $_GET['cd_animal'];
                            $query = $con->query($sql);
                            while($sql=$query->fetch_array())
                            {
                                $nome = $sql['nm_responsavel'];
                                $nomeI = $sql['nm_fantasia'];
                                $tel = $sql['ds_telefone']; 
                                if($tel == ''){ 
                                    $tel = 'N/A';
                                }
                                $cel = $sql['ds_celular'];
                                echo "<hr>";
                                echo "<h4><header>Informações da Instituição Responsavel:</header></h4>";
                                echo "<p>Nome do Responsavel: ". utf8_encode($nome)."</p>";
                                echo "<p>Nome do Instituição: ". utf8_encode($nomeI)."</p>";
                                echo "<p>Telefone: ". $tel."</p>";
                                echo "<p>Celular: ". $cel."</p>";
                                ver();
                            }
                        }
                    }
                    ?>

                </div>
                 
                <div class="col-md-6">
                    <?php 
                    echo "<img src='". $ani->img_path ."' class='img-fluid w-100'>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>