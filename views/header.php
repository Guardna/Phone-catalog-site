
<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
        
        <div id="header_right">
<?php	
	if(isset($_SESSION['korisnickoIme']))
	{
		echo "<br/>Korisnik: ".$_SESSION['korisnickoIme'];
	}
?>
<?php
	if(!isset($_SESSION['korisnickoIme']))
	{
?>
<form action="php/login.php" method="POST">
		<nav>
  <ul>
    <li id="login">
      <a id="login-trigger" href="#">
        Ulogujte se <span>▼</span>
      </a>
      <div id="login-content">
        <form>
          <fieldset id="inputs">
            <input id="kkime" type="text" name="kkime" placeholder="Korisnicko ime">   
            <input id="password" type="password" name="password" placeholder="Lozinka">
          </fieldset>
          <fieldset id="actions">
            <input type="submit" id="submit" name="submit" value="Log in">
          </fieldset>
        </form>
      </div>                     
    </li>
  </ul>
</nav>
</form>
<?php
	}
?>
		</div>
        
        <div class="cleaner"></div>
    </div> 
    
    <div id="templatemo_menu">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" class="selected">Početna</a></li>
                <li><a href="index.php?page=proizvodi">Proizvodi</a>
                    <ul>
                        <li><a href="index.php?page=apple">Apple</a></li>
                        <li><a href="index.php?page=samsung">Samsung</a></li>
                        <li><a href="index.php?page=huawei">Huawei</a></li>
						<li><a href="index.php?page=xiaomi">Xiaomi</a></li>
						<li><a href="index.php?page=proizvodi">Svi Proizvodi</a></li>
                  </ul>
                </li>
                <li><a href="index.php?page=registracija">Registracija</a></li>
                <li><a href="index.php?page=autor">Autor</a></li>
<?php
				if(isset($_SESSION['korisnickoIme']) && $_SESSION['tip'] == 'admin')
				{
			?>
			
				<li><a href="index.php?page=admin">Admin strana</a></li>
			
			<?php
				}
			?>
<?php
				if(isset($_SESSION['korisnickoIme']))
				{
			?>
			
				<li><a href="php/logout.php">Logout</a></li>
			
			<?php
				}
			?>
            </ul>
            <br style="clear: left" />
        </div>
        <div id="menu_search_bar">
        	<div id="templatemo_search">
                <form action="index.php?page=pretraga" method="post">
                  <input type="text" value="Pretraga" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value=" Pretraži " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
    	</div>
    </div>