<?php

session_start();

include "php/konekcija.php";

$page = "";

if(isset($_GET['page'])){
	$page = $_GET['page'];
}

include "views/head.php";
include "views/header.php";
include "views/slider.php";
include "views/levo.php";

switch($page){
	case "pocetna":
		include "views/centar.php";
		break;
	case "admin":
		if(isset($_SESSION['korisnickoIme']) && $_SESSION['tip'] == 'admin'){
		include "views/admin.php";
		}else{include "views/centar.php";}
		break;
	case "autor":
		include "views/autor.php";
		break;
	case "pretraga":
	case "apple":
	case "samsung":
	case "huawei":
	case "xiaomi":
	case "proizvodi":
		include "views/pretraga.php";
		break;
	case "registracija":
		include "views/registracija.php";
		break;
	default:
		include "views/centar.php";
		break;
}

include "views/footer.php";

    
   
    