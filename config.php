<?php

	//$baseUrl = 'http://localhost/rnwa';

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/rnwa/filmSearch.php":
			$CURRENT_PAGE = "Film filter"; 
			$PAGE_TITLE = "Pretražite filmove";
			break;
		case "/rnwa/actorSearch.php":
			$CURRENT_PAGE = "Actor filter"; 
			$PAGE_TITLE = "Pretražite glumce";
            break;
        case "/rnwa/citySearch.php":
			$CURRENT_PAGE = "City filter"; 
			$PAGE_TITLE = "Pretražite gradove";
			break;
		case "/rnwa/servisi/wsdlServis.php":
			$CURRENT_PAGE = "WSDL servis"; 
			$PAGE_TITLE = "Unesite naziv filma";
			break;
		case "/rnwa/servisi/bezWSDL.php":
			$CURRENT_PAGE = "Bez WSDL"; 
			$PAGE_TITLE = "Unesite naziv filma";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Ivan Miloš RNWA2019";
	}
?>