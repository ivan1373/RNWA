<?php
    require('../db.php');
	if(!extension_loaded("soap")){
	  dl("php_soap.dll");
	}
	ini_set("soap.wsdl_cache_enabled",0);
	$server = new SoapServer("film.wsdl");
	

	function findActors($filmName){
		
        //echo $filmName;
		/*$result = mysqli_query("
			SELECT * FROM sakila.film_category_actor
			WHERE sakila.film_category_actor.Title = \"". $filmName."\""
		);*/
		$output = '';
		/*$query = "SELECT * FROM sakila.film_category_actor
		WHERE Title = '".$filmName."''";*/
		$result = mysqli_query($conn,"SELECT * FROM sakila.film_category_actor WHERE Title = '".$filmName."''");
    if($result->num_rows > 0)
		{
			$output .= '
			<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Category</th>
			<th>Price</th>
			<th>Length</th>
			<th>Rating</th>
			<th>First Name</th>
			<th>Last Name</th>
			</tr>';
    
 		while($row1 = mysqli_fetch_array($result))
 		{
			$output .= '
			<tr>
			  <td>'.$row1["Title"].'</td>
			  <td>'.$row1["Description"].'</td>
			  <td>'.$row1["Category"].'</td>
			  <td>'.$row1["Price"].'</td>
			  <td>'.$row1["Length"].'</td>
			  <td>'.$row1["Rating"].'</td>
			  <td>'.$row1["First Name"].'</td>
			  <td>'.$row1["Last Name"].'</td>
			 </tr>
			';
 		}
		 return $output;
		}
		else {
			return 'traženi fislm '.$filmName.' ne postoji!';
		}

	}
	
	$server->AddFunction("findActors");
	$server->handle();
?>