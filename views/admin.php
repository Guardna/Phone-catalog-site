		<form method="POST" action="index.php?page=admin" name="form" enctype="multipart/form-data">
		<div id='content' class="float_r">
		<table  width='100%'>
			<tr>
				<td>
					<input type="submit" value="Lista svih korisnika" name="listaSvihKorisnika" id="listaSvihKorisnika" /> 
				</td>
				<td>
					<input type="submit" value="Lista svih proizvoda" name="listaSvihProizvoda" id="listaSvihProizvoda" /> 
				</td>
				<td>
					<input type="submit" value="Dodaj korisnika" name="dodajKorisnika" id="dodajKorisnika" /> 
				</td>
				<td>
					<input type="submit" value="Dodaj proizvod" name="dodajProizvoda" id="dodajProizvoda" /> 
				</td>
				<td>
					<input type="submit" value="Lista Aktivnosti" name="aktivnosti" id="aktivnosti" /> 
				</td>
			</tr>			
		</table>
		<?php
			if(isset($_SESSION['tip']) == "admin")
			try{
				echo("<table  width='100%'>");
				
				if(isset($_REQUEST['listaSvihKorisnika']))
				try{
					$sviKorisnici = "SELECT * FROM korisnici ORDER BY tip DESC";
					
					$rezKorisnici = $konekcija->query($sviKorisnici)->fetchAll();	

					if(($rezKorisnici) > 0)
					{
						echo("<tr>");
							echo("<th>Korisnicko ime</th>");
							echo("<th>Lozinka</th>");
							echo("<th>Ime i Prezime</th>");
							echo("<th>Mail</th>");
							echo("<th>Uloga</th>");
							echo("<th>Brisanje/Menjanje</th>");
						echo("</tr>");
						
						foreach($rezKorisnici as $redKorisnici):
						echo("<tr>");
							echo("<td>".$redKorisnici->Korisnicko_ime."</td>");
							echo("<td>".$redKorisnici->lozinka."</td>");
							echo("<td>".$redKorisnici->imeprezime."</td>");
							echo("<td>".$redKorisnici->mejl."</td>");
							echo("<td>".$redKorisnici->tip."</td>");
							echo("<td><input type='checkbox' name='selKorisnici[]' value='".$redKorisnici->ID."' /></td>");
						echo("</tr>");
						endforeach;
						
					}else echo("Trenutno ne postoji ni jedan korisnik.");
						echo("<tr>");
							echo("<td><input type='submit' name='obrisiKorisnike' value='Obrisi' /></td>");
							echo("<td><input type='submit' name='menjajKorisnike' value='Menjaj' /></td>");
							echo("<td colspan='4'></td>");
						echo("</tr>");
					
				}catch(PDOException $e){
					echo $e->getMessage();
				}
					
				if(isset($_REQUEST['listaSvihProizvoda']))
				try{
					$sviProizvodi = "SELECT * FROM slike s INNER JOIN galerije g ON s.id_galerije=g.id_galerije";
					
					$rezProizvodi = $konekcija->query($sviProizvodi)->fetchall();
					if($rezProizvodi)
					{
						echo("<tr>");
							echo("<th>Kategorija</th>");
							echo("<th>Ime proizvoida</th>");
							echo("<th>Slika</th>");
							echo("<th>Cena</th>");
						echo("</tr>");
						
						foreach($rezProizvodi as $r):
						
						echo("<tr>");
							echo("<td>".$r->naziv_galerije."</td>");
							echo("<td>".$r->naziv_slike."</td>");
							echo("<td><img src='images/product/".$r->slika."' width='50px' height='50px' /></td>");
							echo("<td>".$r->cena."</td>");
							echo("<td><input type='checkbox' name='selProizvodi[]' value='".$r->id_slike."'/></td>");
						echo("</tr>");
						endforeach;
						
						
					}else echo("Trenutno ne postoji ni jedan proizvod!");
						echo("<tr>");
							echo("<td><input type='submit' name='obrisiProizvod' value='Obrisi' /></td>");
							echo("<td><input type='submit' name='menjajProizvod' value='Menjaj' /></td>");
							echo("<td colspan='4'></td>");
						echo("</tr>");
				}catch(PDOException $e){
					echo $e->getMessage();
				}

				if(isset($_REQUEST['dodajKorisnika']))
				try{
						echo("<tr>");
							echo("<th>Korisnicko ime:</th>");
							echo("<td><input type='text' name='korisnickoIme' /></td>");
						echo("</tr>");
	
						echo("<tr>");
							echo("<th>Lozinka:</th>");
							echo("<td><input type='text' name='korisnikLozinka' /></td>");
						echo("</tr>");
						
						echo("<tr>");
							echo("<th>Ime i Prezime:</th>");
							echo("<td><input type='text' name='korisnikIme' /></td>");
						echo("</tr>");
						
						echo("<tr>");
							echo("<th>Mail:</th>");
							echo("<td><input type='text' name='korisnikPrezime' /></td>");
						echo("</tr>");
						
						echo("<tr>");
							echo("<th>Uloga</th>");
							echo("<td>
									<select name='korisnikUloga'>
										<option value='0'>Izaberite</option>
										<option value='1'>admin</option>
										<option value='2'>kupac</option>
									</select>
							</td>");
						echo("</tr>");
							
						echo("<tr>");
							echo("<td><input type='submit' name='dodajKor' value='Dodaj korisnika' /></td>");
							echo("<td><input type='reset' value='Ponisti' /></td>");
						echo("</tr>");
						
				}catch(PDOException $e){
					echo $e->getMessage();
				}

				if(isset($_REQUEST['dodajProizvoda']))
				try{
						$upit_sve_kategorije = "SELECT * FROM galerije";
						
						$rez_sve_kategorije = $konekcija->query($upit_sve_kategorije)->fetchAll();

						$kategorije ="";
						foreach($rez_sve_kategorije as $red_sve_kategorije):
							$kategorije.="<option value='".$red_sve_kategorije->id_galerije."'>".$red_sve_kategorije->naziv_galerije."</option>";
						endforeach;
					
					echo("<tr>");
						echo("<th>Kategorija</th>");
						echo("<td>
							<select name='proizvodKategorija'>
								<option value='0'>Izaberite</option> ");
								echo($kategorije);
							echo("</select>
						</td>");
					echo("</tr>");
					echo("<tr>");
						echo("<th>Ime proizvoda</th>");
						echo("<td><input type='text' name='proizvodIme' /></td>");						
					echo("</tr>");
					echo("<tr>");
						echo("<th>Slika</th>");
						echo("<td><input type='file' name='proizvodSlika' /></td>");						
					echo("</tr>");
					echo("<tr>");
						echo("<th>Cena</th>");
						echo("<td><input type='text' name='proizvodCPK' /></td>");						
					echo("</tr>");
					
					echo("<tr>");
							echo("<td><input type='submit' name='dodajPro' value='Dodaj proizvod' /></td>");
							echo("<td><input type='reset' value='Ponisti' /></td>");
					echo("</tr>");
				}catch(PDOException $e){
					echo $e->getMessage();
				}
				if(isset($_REQUEST['aktivnosti']))
				try{
					$sveaktivnosti = "SELECT * FROM aktivnost";
					
					$rezaktivnosti = $konekcija->query($sveaktivnosti)->fetchall();
					if($rezaktivnosti)
					{
						echo("<tr>");
							echo("<th>ID</th>");
							echo("<th>Korisnik</th>");
							echo("<th>Promena</th>");
							echo("<th>Datum</th>");
						echo("</tr>");
						
						foreach($rezaktivnosti as $r):						
						echo("<tr>");
							echo("<td>".$r->id."</td>");
							echo("<td>".$r->User."</td>");
							echo("<td>".$r->Promena."</td>");
							echo("<td>".$r->Datum."</td>");
						echo("</tr>");
						endforeach;	
					}
				}catch(PDOException $e){
					echo $e->getMessage();
				}
				echo("</table>");
				
				if(isset($_REQUEST['obrisiKorisnike']))
				try{
					$korisnici = (empty($_REQUEST['selKorisnici']) ?  null : $_REQUEST['selKorisnici']);
					if($korisnici)
					{
						$deleted="";
						foreach($korisnici as $kor => $val)
						{
								$provera = "SELECT * FROM korisnici WHERE ID= ".$val;
								$red = $konekcija->query($provera)->fetch(PDO::FETCH_ASSOC);	
								
								$deleted .= $red['imeprezime'].':';
								
								$obrisi = "DELETE FROM korisnici WHERE ID=".$val;
								$konekcija->prepare($obrisi)->execute();
						}
						$deleted = explode(':', $deleted);
						for($i=0; $i<count($deleted); $i++)
							if($deleted[$i] != ""){
								$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Obrisali ste ".$red['imeprezime']."')";
								$konekcija->prepare($aktiv)->execute();	
								echo("Obrisali ste ".$red['imeprezime'].".<br/>");
							}
					}else echo("Niste izabrali ni jednog korisnika.");
				}catch(PDOException $e){
					echo $e->getMessage();
				}//obrisiKorisnika
				
				if(isset($_REQUEST['menjajKorisnike']))
				try{
					$korisnici = (empty($_REQUEST['selKorisnici']) ?  null :$_REQUEST['selKorisnici']);
					if($korisnici)
					{
					echo("<form method='POST' action='admin.php'>");
					echo("<table>");
						echo("<tr>");
							echo("<th>Korisnicko ime</th>");
							echo("<th>Lozinka</th>");
							echo("<th>Ime i Prezime</th>");
							echo("<th>Mail</th>");
							echo("<th>Uloga</th>");
						echo("</tr>");

						foreach($korisnici as $kor => $val)
						{
							$provera = "SELECT * FROM korisnici WHERE ID= ".$val;
							$r = $konekcija->query($provera)->fetch(PDO::FETCH_ASSOC);	
							
							echo("<tr>");
								echo("<td>
									<input type='hidden' name='id[]' value='".$r['ID']."' />
									<input type='text' name='korIme[]' value='".$r['Korisnicko_ime']."' />
									</td>");
								echo("<td>
									<input type='text' name='lozinka' value='".$r['lozinka']."' />
								</td>");
								echo("<td>
									<input type='text' name='ime[]' value='".$r['imeprezime']."' />
								</td>");
								echo("<td>
									<input type='text' name='prezime[]' value='".$r['mejl']."' />
								</td>");
								echo("<td>
									<input type='text' name='tip[]'  value='".$r['tip']."' />
								</td>");
							echo("</tr>");
							
						}
						echo("<tr>");
							echo("<td colspan='5'><input type='submit' value='Sacuvaj promene' name='sacuvajKorisnike'</td>");
						echo("</tr>");						
					echo("</form>");
					echo("</table>");						
					}else echo("Niste nista odabrali.");
				}catch(PDOException $e){
					echo $e->getMessage();
				}//menjaj korisnike
	
				if(isset($_REQUEST['sacuvajKorisnike']))
				try{
					$id_kor = $_REQUEST['id'];
					$korisnicko_ime = $_REQUEST['korIme'];
					$lozinka = md5($_REQUEST['lozinka']);
					$ime = $_REQUEST['ime'];
					$prezime = $_REQUEST['prezime'];
					$tip = $_REQUEST['tip'];
					
					$i=0;
					foreach($id_kor as $id)
					{
						
							$unapredi = "UPDATE korisnici SET Korisnicko_ime='".$korisnicko_ime[$i]."', lozinka='".$lozinka."'
							, imeprezime='".$ime[$i]."', mejl='".$prezime[$i]."', tip='".$tip[$i]."' WHERE ID=$id";
							$r = $konekcija->prepare($unapredi)->execute();	
							if($r){
							$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Uspesno ste promenili korisnika ".$ime[$i]."')";
							$r = $konekcija->prepare($aktiv)->execute();	
								echo("Uspesno ste promenili korisnika $ime[$i]<br/>");
							}
							else
								echo("Niste uspeli da promenite korisnika $ime[$i]<br/>");
						

						$i++;
					}
				}catch(PDOException $e){
					echo $e->getMessage();
				}//sacuvaj
			
				if(isset($_REQUEST['obrisiProizvod']))
				try{
					$proizvod = (empty($_REQUEST['selProizvodi']) ?  null : $_REQUEST['selProizvodi']);
					if($proizvod)
					try {		
						$deleted="";
						foreach($proizvod as $pro => $val)
						{
								$provera = "SELECT * FROM slike WHERE id_slike=".$val;
								$r = $konekcija->query($provera)->fetch(PDO::FETCH_ASSOC);	
																
								unlink('images/product/'.$r['slika']);
								$deleted .= $r['naziv_slike'].':';
								
								$obrisi = "DELETE FROM slike WHERE id_slike=".$val;
								$konekcija->prepare($obrisi)->execute();
						}
						$deleted = explode(':', $deleted);
						for($i=0; $i<count($deleted); $i++)
							if($deleted[$i] != "")try{
								$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Obrisali ste ".$r['naziv_slike']."')";
								$konekcija->prepare($aktiv)->execute();	
								echo("Obrisali ste ".$r['naziv_slike'].".<br/>");
							}catch(PDOException $e){
								echo $e->getMessage();
							}
							echo("Nije moguce obrisati proizvod.");
					}catch(PDOException $e){
						echo $e->getMessage();}
						echo("Niste izabrali ni jedan proizvod.");
				}catch(PDOException $e){
					echo $e->getMessage();
				}
				if(isset($_REQUEST['menjajProizvod']))
				try{
					$proizvod = (empty($_REQUEST['selProizvodi']) ?  null : $_REQUEST['selProizvodi']);

					if($proizvod)
					{
						echo("<form method='POST' action='admin.php' enctype='multipart/form-data'>");
						echo("<table>");
							echo("<tr>");
								echo("<th>Kategorija</th>");
								echo("<th>Naziv</th>");
								echo("<th>Slike</th>");
								echo("<th>Cena</th>");
							echo("</tr>");

							foreach($proizvod as $pro => $val)
							{
								$provera = "SELECT * FROM slike WHERE id_slike= ".$val;
								$r = $konekcija->query($provera)->fetch(PDO::FETCH_ASSOC);	
								
								
								$kategorije = "SELECT * FROM galerije WHERE id_galerije= ".$r['id_galerije'];
								$re = $konekcija->query($kategorije)->fetch(PDO::FETCH_ASSOC);
								
								echo("<tr>");
									echo("<td>
										<input type='hidden' name='id[]' value='".$r['id_slike']."' />
										<input type='text' name='naziv_kat[]' size='4' value='".$re['naziv_galerije']."' />
										</td>");
									echo("<td>
										<input type='text' name='naziv_pro[]' size='15' value='".$r['naziv_slike']."' />
										</td>");
									echo("<td>
										<img src='images/product/".$r['slika']."' width='100px' height='100px' />
										<input type='file' name='slike[]' />
									</td>");
									echo("<td>
										<input type='text' name='cena_po_kol[]' size='2'  value='".$r['cena']."' />
									</td>");
								echo("</tr>");
								
							}
							echo("<tr>");
								echo("<td colspan='5'><input type='submit' value='Sacuvaj promene' name='sacuvajProizvode'</td>");
							echo("</tr>");						
						echo("</form>");
						echo("</table>");

					}else echo("Niste izabrali ni jedan proizvod.");
				}catch(PDOException $e){
					echo $e->getMessage();
				}//menjajKorisnika
			
				if(isset($_REQUEST['sacuvajProizvode']))
				try{
					$id_pro = $_REQUEST['id'];
					$naziv_kat = $_REQUEST['naziv_kat'];
					$naziv_pro = $_REQUEST['naziv_pro'];
					
					
					$imeSlike = $_FILES['slike']['name'];
					$tmp_slike = $_FILES['slike']['tmp_name'];
					
					$cena_po_kol = $_REQUEST['cena_po_kol'];
					
					$i=0;
					$root = "images/product/";
					foreach($id_pro as $id)
					{
						
						$upit_slika = "SELECT * FROM slike WHERE id_slike=".$id."";
						$red_slika = $konekcija->query($upit_slika)->fetch();	

						
						$putanjaSlike = ($tmp_slike[$i] != null)? $root.$imeSlike[$i]: $red_slika->slika;
						echo $putanjaSlike."<br/>";

						if($putanjaSlike != $red_slika->slika)
						{
							$rez = move_uploaded_file($tmp_slike[$i], $putanjaSlike);
							unlink('images/product/'.$red_slika->slika);
							
							$putanjaZaKorisnike = $imeSlike[$i];
						}else $putanjaZaKorisnike = $putanjaSlike;
						
						$upit_id_kategorija = "SELECT * FROM galerije WHERE naziv_galerije LIKE '".$naziv_kat[$i]."'";
						$red_kat = $konekcija->query($upit_id_kategorija)->fetch();
						
						$upit_update = "UPDATE slike SET id_galerije=".$red_kat->id_galerije.", naziv_slike='".$naziv_pro[$i]."',slika='".$putanjaZaKorisnike."', cena='".$cena_po_kol[$i]."' WHERE id_slike=$id";
						$r = $konekcija->prepare($upit_update)->execute();
						if($r){
							$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Uspesno ste promenili proizvod $naziv_kat[$i] $naziv_pro[$i]')";
							$r = $konekcija->prepare($aktiv)->execute();
							echo("Uspesno ste promenili proizvod $naziv_kat[$i] $naziv_pro[$i]<br/>");
						}
						else
							echo("Niste uspeli da promenite proizvod $naziv_kat[$i] $naziv_pro[$i]<br/>");

						$i++;

					}
				}catch(PDOException $e){
					echo $e->getMessage();
				}
		
				if(isset($_REQUEST['dodajKor']))
				try{
					$korIme = $_REQUEST['korisnickoIme'];
					$lozinka = md5($_REQUEST['korisnikLozinka']);
					$ime = $_REQUEST['korisnikIme'];
					$prezime = $_REQUEST['korisnikPrezime'];
					$uloga = $_REQUEST['korisnikUloga'];

					$greska_dodaj = false;
					
					if(strlen($korIme) == 0)
						$greska_dodaj = true;
					if(strlen($lozinka) == 0)
						$greska_dodaj = true;
					if(strlen($ime) == 0)
						$greska_dodaj = true;
					if(strlen($prezime) == 0)
						$greska_dodaj = true;
					if($uloga == "0")
						$greska_dodaj = true;
					
					if(!$greska_dodaj)
					{
						switch($uloga)
						{
							case "1": $ulogaString = "admin"; break;
							case "2": $ulogaString = "kupac"; break;
						}
						$upit_dodaj_korisnika = "INSERT INTO korisnici(Korisnicko_ime, lozinka, imeprezime, mejl, tip) 
						VALUES('".$korIme."', '".$lozinka."', '".$ime."', '".$prezime."', '".$ulogaString."')";
						$r = $konekcija->prepare($upit_dodaj_korisnika)->execute();
						if($r){
							$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Uspesno ste dodali korisnika ".$korIme."!')";
							$r = $konekcija->prepare($aktiv)->execute();
							echo("Uspesno ste dodali korisnika ".$korIme."!");
						}
						else
							echo("Niste uspeli da dodate korisnika!");

					}else echo("Niste popunili neko polje!");
				}catch(PDOException $e){
					echo $e->getMessage();
				}

				if(isset($_REQUEST['dodajPro']))
				try{
					$kategorija = $_REQUEST['proizvodKategorija'];
					$ime = $_REQUEST['proizvodIme'];

					$imeSlike = $_FILES['proizvodSlika']['name'];
					$tmpPozSlike = $_FILES['proizvodSlika']['tmp_name'];

					$cena_po_kol = $_REQUEST['proizvodCPK'];
					
					$greska_dodaj = false;
					
					if(strlen($ime) == 0)
						$greska_dodaj = true;
					if(strlen($imeSlike) == 0)
						$greska_dodaj = true;
					if(strlen($cena_po_kol) == 0)
						$greska_dodaj = true;
					if($kategorija == 0)
						$greska_dodaj = true;
					
					if(!$greska_dodaj)
					{
						$rootZaUploadSlika="images/product/";
						$rootZaBazu="";
						
						$rootZaUploadSlika.=$imeSlike;
						
						move_uploaded_file($tmpPozSlike, $rootZaUploadSlika);
						$rootZaBazu.=$imeSlike;

						$upit_dodaj = "INSERT INTO slike(id_galerije, naziv_slike, slika, cena)
						VALUES(".$kategorija.", '".$ime."', '".$rootZaBazu."' , ".$cena_po_kol.")";
						
						$r = $konekcija->prepare($upit_dodaj)->execute();
						if($r){
							$aktiv="INSERT INTO aktivnost(User,Promena) VALUES('".$_SESSION['korisnickoIme']."','Uspesno ste ubacili novi proizvod ".$ime."!')";
							$r = $konekcija->prepare($aktiv)->execute();
							echo("Uspesno ste ubacili novi proizvod ".$ime."!");
						}
						else
							echo("Niste ubacili novi proizvod!");						
					}else echo("Nisu sva polja popunjena!");
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}catch(PDOException $e){
				echo $e->getMessage();}
	
        ?>
		</div><div class="cleaner"></div>
		</form>
    </div>
