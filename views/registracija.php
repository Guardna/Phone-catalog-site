		<div id="content" class="float_r" >
                <div id="contact_form">
                   <form method="post" action="index.php?page=registracija" name="form" enctype="multipart/form-data" >
                        
                        <label>Ime i Prezime:</label> <input type="text" id="imeprezime" name="imeprezime" class="required input_field" onkeyup="proveraKontakt()"/>
                        <div class="cleaner h10"></div>
                        <label>Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" onkeyup="proveraKontakt()"/>
                        <div class="cleaner h10"></div>
                        
						<label>Korisnicko ime:</label> <input type="text" name="kime" id="kime" class="input_field" onkeyup="proveraKontakt()"/>

						<div class="cleaner h10"></div>
        
                        <label>Lozinka:</label><input type="password" id="sifra" name="sifra" class="required input_field" onkeyup="proveraKontakt()"/>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Registruj" id="salji" name="salji" class="submit_btn float_l"/>
						<input type="reset" value="Ponisti" id="reset" name="reset" class="submit_btn float_l" />
                        
            	</form>
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
                </div>	
		</div>
		<div class="cleaner"></div>
    </div>