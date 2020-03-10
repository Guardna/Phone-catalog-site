        <form method="POST" action="index.php?page=pretraga" name="form" enctype="multipart/form-data">
		<div id="content" class="float_r">
        	<?php
	if(isset($_REQUEST['Search']))
	try{
		$vrednostPolja = $_REQUEST['keyword'];
		
		$upit = "SELECT * FROM slike WHERE naziv_slike LIKE '%$vrednostPolja%' ORDER BY id_slike DESC";
		
		$rez = $konekcija->query($upit)->fetchAll();		
		
		if(count($rez) == 0)
				{
					print "Niste uneli ime pravilno ili nemamo taj proizvod!";
				}
			else
	{
		$slike = array();
		$brojslika=count($rez);
		$postrani=9;
				$strane=ceil($brojslika/$postrani);
				if (!isset($_GET['pagi'])) {
					$page = 1;
					} else {
					$page = $_GET['pagi'];
						}
						
						$this_page_first_result = ($page-1)*$postrani;
						$upit=$upit .' LIMIT ' . $this_page_first_result . ',' .  $postrani;
						$rez = $konekcija->query($upit)->fetchAll();
						
					$brojslika=count($rez);

				for ($i=0;$i<$brojslika;$i++){
					foreach($rez as $r):	
					$slike[] = $r;
					print "<div class='product_box'>";
					print "<a href='".$dir_velike.$slike[$i]->slika."' class='highslide'  onclick='return hs.expand(this)'>";
					print "<img src='".$dir_velike.$slike[$i]->slika."'  alt=".$slike[$i]->naziv_slike." /></a>";
					print "<h3>".$slike[$i]->naziv_slike."</h3>";
					print "<p class='product_price'>".$slike[$i]->cena."</p></div>";
					if (++$i == $brojslika) break;
					endforeach;
				}
				print "<div class='float_r'>";
				for ($page=1;$page<=$strane;$page++) {
					echo '<div class="float_l">&nbsp&nbsp<a href="index.php?page='.$vrednostPolja.'&pagi=' . $page . '" >' . $page . '</a></div>';
					}
					print "</div>";
			}
		
	}catch(PDOException $e){
		echo $e->getMessage();
	}
		if(isset($_REQUEST['page']))try{
			$vrednostPolja = $_REQUEST['page'];
			if($vrednostPolja !='pretraga'){
			if($vrednostPolja =='proizvodi'){
			$upit= "SELECT * FROM slike ORDER BY id_slike DESC";
		}else{
		
		$upit = "SELECT * FROM slike s, galerije g WHERE s.id_galerije=g.id_galerije AND naziv_galerije LIKE '%$vrednostPolja%' ORDER BY id_slike DESC";
		
		}
		
		$rez = $konekcija->query($upit)->fetchAll();
		
		if(count($rez) == 0)
				{
					print "Niste uneli ime pravilno ili nemamo taj proizvod!";
				}
			else
	{
		$slike = array();
		$brojslika=count($rez);
		$postrani=9;
				$strane=ceil($brojslika/$postrani);
				if (!isset($_GET['pagi'])) {
					$page = 1;
					} else {
					$page = $_GET['pagi'];
						}
						
						$this_page_first_result = ($page-1)*$postrani;
						$upit=$upit .' LIMIT ' . $this_page_first_result . ',' .  $postrani;
						$rez = $konekcija->query($upit)->fetchAll();
						
				
					$brojslika=count($rez);
				for ($i=0;$i<$brojslika;$i++){
					foreach($rez as $r):	
					$slike[] = $r;
					print "<div class='product_box'>";
					print "<a href='".$dir_velike.$slike[$i]->slika."' class='highslide'  onclick='return hs.expand(this)'>";
					print "<img src='".$dir_velike.$slike[$i]->slika."'  alt=".$slike[$i]->naziv_slike." /></a>";
					print "<h3>".$slike[$i]->naziv_slike."</h3>";
					print "<p class='product_price'>".$slike[$i]->cena."</p></div>";
					if (++$i == $brojslika) break;
					endforeach;
				}
				print "<div class='float_r'>";
				for ($page=1;$page<=$strane;$page++) {
					echo '<div class="float_l" >&nbsp&nbsp<a href="index.php?page='.$vrednostPolja.'&pagi=' . $page . '" >' . $page . '</a></div>';
					}
				print "</div>";
				
			}
			}
			
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
        </div> 
        <div class="cleaner"></div>
		</form>
    </div> 