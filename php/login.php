<?php
session_start();
				if(isset($_REQUEST['submit']))
				try{
					$user = $_REQUEST['kkime'];
					$pass = $_REQUEST['password'];

					$errors = [];
					$regkime = "/^[A-Z]{1}[a-z]{2,9}$/";
					$regpassword = "/^[\w\d\S]+$/";

					if(!preg_match($regkime, $user)){
					$errors[] = "Ime nije ok.";
					}

					if(!preg_match($regpassword, $pass)){
					$errors[] = "Lozinka nije ok.";
					}

					if(count($errors) > 0){
					$_SESSION['greske'] = $errors;
					header("Location: ../index.php");
					}else{
		
					require_once "konekcija.php";
					$pass = md5($_REQUEST['password']);
					
					$upita = "SELECT * FROM korisnici WHERE Korisnicko_ime =:ime AND lozinka=:loz";

					
					$reza = $konekcija->prepare($upita);
					$reza->bindParam(":ime", $user);
					$reza->bindParam(":loz", $pass);

					$reza->execute();
					$usera = $reza->fetch();
							
					if($usera) {
						$_SESSION['tip'] = $usera->tip;
						$_SESSION['korisnickoIme'] = $usera->Korisnicko_ime;
						$_SESSION['id'] = $usera->ID;
						if($_SESSION['tip'] == 'admin'){
						header("location: ../index.php?page=admin");
						}else{ 
						header("location: ../index.php");
						}		        
					}else {
			        $_SESSION['greske'] = "Pogresno ime ili lozinka.";
			        header("Location: ../index.php");}
					}
				
					
				}catch(PDOException $e){
					echo $e->getMessage();
				}




?>