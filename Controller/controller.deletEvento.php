<?php
	include "..\model\connection.php";
	include '..\model\evento.factory.php';
	
	$idEvento = $_GET['idEvento'];
	$evento = new evento();
    
    if(isset($_GET['confirmado'])){
        if($evento->delete($idEvento)){
            header("Location: ../view/view.listaEvento.php");
        } else {
            header("Location: ../view/view.listaEvento.php");
        }
    }
    else
    {
        header("Location: ../view/view.listaEvento.php");
    }
?>