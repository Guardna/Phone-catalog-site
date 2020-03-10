<?php
	session_start();
	
	if(isset($_SESSION['korisnickoIme']))
	{
		unset($_SESSION['korisnickoIme']);
		unset($_SESSION['tip']);
		unset($_SESSION['id']);
		
		session_destroy();
		header('Location:../index.php');
	}
	else
	{
		header('Location:../index.php');
	}
?>