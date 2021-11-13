<?php
	include "..\model\connection.php";
	include '..\model\animal.factory.php';
    include "..\model\pessoa.factory.php";
    include '..\Controller\controller.login.php';

    $favoritado = new usuario();
    $id = $_POST['idUSU'];
    $cd = $_POST['idANI'];

    if($_SESSION['tipo'] == 'Usuario')
    {
        
        if($favoritado->addFav($id, $cd))
        {
            echo "<script> window.location.href='../view/view.detalheAnimal.php?cd_animal=".$cd."'</script>";
        }
        else 
        {
            echo "<script> alert('Erro ao adicionar o animal como favoritado'); window.location.href='../view/view.addUSU.php'</script>";
        }
    }
?>