<?php
	include "..\model\connection.php";
	include '..\model\evento.factory.php';
	
	$id = $_GET['idEvento'];
	$evento = new evento();
	if(isset($_FILES['img_name']) && $_FILES['img_name']['size'] > 0){
		$arquivo = $_FILES['img_name'];
		$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
		$extensoes_validas = array("gif", "jpg", "jpeg", "png");
		if(!in_array($extensao, $extensoes_validas)){
			die("<script> alert('Extensão de arquivo inválida para upload.'); window.location.href='../view/view.listaAnimal.php'</script>");
		}
		else{
		$arquivo_nome = md5(uniqid($arquivo['name'])).".".$extensao;
			if($extensao != null){
			$diretorio = $caminho_absoluto;
			move_uploaded_file($_FILES['img_name']['tmp_name'], $diretorio.$arquivo_nome);
			}
			else{
				$arquivo_nome = null;
			}
		}
	}else{
		$arquivo_nome = $_POST['img_anterior'];
	}
	
	if($evento->edit($_GET['idEvento'], $_GET['titulo'], $_GET['tipo'], $_GET['data'], $_GET['hrinicio'], $_GET['hrtermino'], $_GET['descricao'])){
		header("Location: ../view/view.listaEvento.php");
	} else {
		header("Location: ../view/view.listaEvento.php");
	}
	
?>