<?php
    
	if(!extension_loaded("soap")){
	  dl("php_soap.dll");
	}
	ini_set("soap.wsdl_cache_enabled",0);
	$server = new SoapServer("film.wsdl");


	function findActors($filmName){
		include('../db.php');
        //echo $filmName;
		/*$result = mysqli_query("
			SELECT * FROM sakila.film_category_actor
			WHERE sakila.film_category_actor.Title = \"". $filmName."\""
		);*/
		$film = strtoupper($filmName);
		$output = '';
		$query = "SELECT * FROM sakila.film_category_actor WHERE title = '".$film."'";
		$result = mysqli_query($conn, $query);
		//$result = $conn->query($query);
    if(mysqli_num_rows($result) > 0)
		{
			
    
 		while($row1 = mysqli_fetch_assoc($result))
 		{
			$output .= '
			<tr>
			  <td>'.$row1["Title"].'</td>
			  <td>'.$row1["Description"].'</td>
			  <td>'.$row1["Category"].'</td>
			  <td>'.$row1["Price"].'</td>
			  <td>'.$row1["Length"].'</td>
			  <td>'.$row1["Rating"].'</td>
			  <td>'.$row1["First name"].'</td>
			  <td>'.$row1["Last name"].'</td>
			 </tr>
			';
 		}
		 return $output;
		}
		else {
			return 'traženi film '.$filmName.' ne postoji!';
		}

	}
	
	$server->AddFunction("findActors");
	$server->handle();
?>