<?php
	include "..\model\connection.php";
	include "..\model\ong.factory.php";
	include '..\model\cadastro.factory.php';
	include '..\Controller\controller.login.php';

	$id = $_SESSION['id'];
	$emailL = $_SESSION['email'];
	$ong = new instituicao();
	$usuL = new Login();

	if(isset($_POST['confirmado'])){
		if($ong->delete($id) && $usuL->desactive($id, $emailL) && $usu->deleteCascade($id)){
			echo "<script> alert('Conta desativa, agradecemos pelo tempo que passou com a gente, esperamos te ver novamente.'); window.location.href='../Controller/controller.logout.php'</script>";
		}else{
			echo "<script> alert('Problemas na exclusão.')</script>";
		}
	}
    else
    {
        header("Location: ../view/view.updateONG.php");
    }
?>