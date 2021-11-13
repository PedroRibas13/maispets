<?php
	include '..\model\connection.php';
	include '..\model\evento.factory.php';
	include '..\Controller\controller.login.php';
	$caminho_absoluto='../template/img/evento_img/';
	$evento = new evento();
	$id = $_SESSION['id'];

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

    if($evento->add($_POST['titulo'], $_POST['descricao'],$_POST['data'],$_POST['hrinicio'],$_POST['hrtermino'], $_POST['idTipo'],$id, $arquivo_nome))
    {
		echo '<script> alert("Evento criado com sucesso"); window.location.href="../view/view.listaEvento.php"</script>';
    }
    else 
    {
		echo "<br>Erro ao inserir dados.<br>";
	}
?>