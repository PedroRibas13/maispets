<?php
	include '..\model\connection.php';
	include '..\model\pessoa.factory.php';
	include '..\model\cadastro.factory.php';
	include '..\Controller\controller.login.php';
	$caminho_absoluto='../template/img/user_img/';
	$id = $_SESSION['id'];
	$emailL = $_SESSION['email'];
	$img = $_SESSION['img_name'];
	$usu = new usuario();
	$usuL = new Login();

	if(isset($_FILES['img_name'])){
		$arquivo = $_FILES['img_name'];
		$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
		$extensoes_validas = array("gif", "jpg", "jpeg", "png");
		if(!in_array($extensao, $extensoes_validas)){
			die("<script> alert('Extensão de arquivo inválida para upload.'); window.location.href='../view/view.addUSU.php'</script>");
		}
		else{
		$arquivo_nome = md5(uniqid($arquivo['name'])).".".$extensao;
			if($extensao != null){
			$diretorio = $caminho_absoluto;
			move_uploaded_file($_FILES['img_name']['tmp_name'], $diretorio.$arquivo_nome);
			}
			else{
				$arquivo_nome = $img;
			}
		}
	}
	
	if($_POST['senha'] == ''){
		$_POST['senha'] = $_POST['senhaAntiga'];
	}

	if($usu->edit($_POST['senhaAntiga'], $_POST['senha'], $_POST['celular'],$_POST['info'] , $id, $arquivo_nome) && $usuL->editLogin($_POST['senha'], $emailL)){
		echo "<script> alert('Parece que algumas coisas mudaram.Faça o login de novo por favor!'); </script>";	
		header('Location: ..\controller\controller.logout.php');
	} else {
		echo "<script> alert('Problemas ao realizar alteração'); </script>";
	}
?>
