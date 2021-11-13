<?php
	include "..\model\connection.php";
	include '..\model\cadastro.factory.php';
	include "..\model\pessoa.factory.php";
	$caminho_absoluto='../template/img/user_img/';
	$uso = new usuario();
	$usuL = new Login();

	//Verificando se o E-mail existe
	$con = $GLOBALS['con'];
	$validador = $_POST['email'];
	$sql = "SELECT ds_email FROM tb_login WHERE ds_email = '$validador'";
	$procura = mysqli_query($con, $sql);
	$checa_usuario = mysqli_num_rows($procura);
	if($checa_usuario < 0){
	//Caso nenhum resultado seja retornado, o cadastro pode prosseguir.
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
					$arquivo_nome = null;
				}
			}
		}

		if($uso->add($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['nascimento'], $_POST['celular'], $_POST['info'], $arquivo_nome) && $usuL->addU($_POST['email'], $_POST['senha']))
		{
			header("Location: ../view/view.login.php");
			echo '<script> alert("Dados inseridos com sucesso, redirecionando para a pagina de login"); window.location.href="../view/view.login.php"</script>';
		}
		else 
		{
			echo "<script> alert('Erro ao inserir dados, tente de novo'); window.location.href='../view/view.addUSU.php'</script>";
		}

	}
	else{
	//Ele avisa que o E-mail já foi cadastrado.
	echo "<script> alert('Esse email já foi cadastrado.'); window.location.href='../view/view.addUSU.php'</script> ";
	}
?>