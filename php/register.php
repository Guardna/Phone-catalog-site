<?php
		if(isset($_REQUEST["salji"]))
		try{
			$ime = $_REQUEST['imeprezime'];
			$mail = $_REQUEST['email'];	
			$korisnicko_ime = $_REQUEST['kime'];
			$lozinka = md5($_REQUEST['sifra']);	
			
			$regImePrezime = "/^[A-Z]{1}[a-z]{2,9}(\s[A-Z]{1}[a-z]{2,9})+$/";
			$regEmail = "/^[a-z0-9]+(\.[a-z0-9]+)*\@[a-z]+(\.[a-z]+)+$/";
			$regkime = "/^[A-Z]{1}[a-z]{2,9}$/";
			$regpassword = "/^[\w\d\S]+$/";

			$greska_dodaj = false;
			
			if(!preg_match($regImePrezime, $ime))
				{
					$greska_dodaj = true;
				}
			if(!preg_match($regEmail, $mail))
				{
					$greska_dodaj = true;
				}
			if(!preg_match($regkime, $korisnicko_ime))
				{
					$greska_dodaj = true;
				}
			if(!preg_match($regpassword, $lozinka))
				{
					$greska_dodaj = true;
				}
			
			if(!$greska_dodaj)
			{
				$upit_napravi_nalog = "INSERT INTO korisnici(Korisnicko_ime, lozinka, imeprezime, mejl, tip) 
				VALUES('".$korisnicko_ime."', '".$lozinka."', '".$ime."', '".$mail."', 'kupac')";
				$r = $konekcija->prepare($upit_napravi_nalog)->execute();	
				echo("</br>&nbspUspesno ste registrovani!");
			}else echo("</br>&nbspNepravilno popunjena forma!");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
?>