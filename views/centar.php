		<form method="POST" action="index.php?page=pocetna" name="form" enctype="multipart/form-data">
		<?php
        print "<div id='content' class='float_r'>";
		print "<h1>Novi Postovi</h1>";
		
			$upit_g = "SELECT * FROM slike ORDER BY id_slike DESC";
			$rez_g = $konekcija->query($upit_g)->fetchAll();
			if(count($rez_g) == 0)
				{
					print "Trenutno nema slika za izabranu galeriju!";
				}
			else
			{
				for ($i=0;$i<9;$i++){
				$slike = array();
				foreach($rez_g as $r):							
				
					$slike[] = $r;
					print "<div class='product_box'>";
					print "<a href='".$dir_velike.$slike[$i]->slika."' class='highslide'  onclick='return hs.expand(this)'>";
					print "<img src='".$dir_velike.$slike[$i]->slika."'  alt=".$slike[$i]->naziv_slike." /></a>";
					print "<h3>".$slike[$i]->naziv_slike."</h3>";
					print "<p class='product_price'>".$slike[$i]->cena."</p></div>";
					if (++$i == 9) break;
				endforeach;
				}
				
				print "</div><div class='cleaner'></div>";	
			}
		
		
	
        ?>
		</form>
    </div>