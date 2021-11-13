<?php
	include "..\model\connection.php";
	include "..\model\animal.factory.php";
	$caminho_absoluto='../template/img/animal_img/';
	$idanimal = $_POST['idAnimal'];
	$animal = new animal();

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


	if($animal->edit($_POST['idAnimal'], $_POST['nome'], $_POST['nascimento'], $_POST['sexo'], $_POST['especie'], $_POST['porte'], $_POST['info'], $arquivo_nome)){
		echo "<script> alert('Dados do animal atualizados, retornando a sua lista.'); window.location.href='../view/view.listaAnimal.php'</script>";
	} else {
		echo "<script> alert('Algo ocorreu de errado, estamos analisando isso.'); window.location.href='../view/view.listaAnimal.php'</script>";
	}
?>