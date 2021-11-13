<?php
	include "..\model\connection.php";
	include "..\model\animal.factory.php";
	include '..\Controller\controller.login.php';
	$caminho_absoluto='../template/img/animal_img/';
	$pet = new animal();
	$id = $_SESSION['id'];
	$tipo = $_SESSION['tipo'];

	if(isset($_POST['nascimentocb']))
	{
		$nascimento = '0000';
	}
	else{
		$nascimento = $_POST['nascimento'];
	}

	if(isset($_FILES['img_name'])){
		$arquivo = $_FILES['img_name'];
		$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
		$extensoes_validas = array("gif", "jpg", "jpeg", "png");
		if(!in_array($extensao, $extensoes_validas)){
			die("<script> alert('Extensão de arquivo inválida para upload.'); window.location.href='../view/view.addUSU.php'</script>");
		}
		else
		{
		$arquivo_nome = md5(uniqid($arquivo['name'])).".".$extensao;
			if($extensao != null){
			$diretorio = $caminho_absoluto;
			move_uploaded_file($_FILES['img_name']['tmp_name'], $diretorio.$arquivo_nome);
			}
			else
			{
				$arquivo_nome = null;
			}
		}
	}

	if($tipo == 'Usuario'){
		if($pet->addUSU($_POST['nome'], $_POST['sexo'], $_POST['info'], $nascimento, $_POST['porte'], $_POST['especie'], $_POST['cidade'], $_POST['castracao'], $_POST['especial'], $id, $arquivo_nome))
		{
			echo '<script> alert("Dados inseridos com sucesso"); window.location.href="../view/view.addAnimal.php"</script>';
		}
		else 
		{
			echo '<script> alert("Erro ao inserir animal"); window.location.href="../view/view.addAnimal.php"</script>';
		}
	}
	
	if($tipo == 'Instituicao'){
		if($pet->addONG($_POST['nome'], $_POST['sexo'], $_POST['info'], $_POST['nascimento'], $_POST['porte'], $_POST['especie'], $id, $arquivo_nome))
		{
			echo '<script> alert("Dados inseridos com sucesso"); window.location.href="../view/view.addAnimal.php"</script>';
		}
		else 
		{
			echo '<script> alert("Erro ao inserir animal"); window.location.href="../view/view.addAnimal.php"</script>';
		}
	}
?>