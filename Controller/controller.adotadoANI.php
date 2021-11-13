<?php
	include "..\model\connection.php";
	include "..\model\animal.factory.php";
	
	$idAnimal = $_GET['idAnimal'];
	$animal = new animal();
	
	if(isset($_GET['confirmAdotado'])){
		if($animal->adotado($idAnimal)){
			header("Location: ../view/view.listaAnimal.php");
		} else {
			header("Location: ../view/view.listaAnimal.php");
		}
	}
	else{
		header("Location: ../view/view.listaAnimal.php");
	}
?>