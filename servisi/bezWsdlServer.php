<?php
function returnMovies($cat, $num) { 
    include('../db.php');
    
    $catName = ucfirst(strtolower($cat));
    $output = '';
		$query = "SELECT * FROM sakila.noviView WHERE category = '".$catName."' LIMIT ".$num."";
		$result = mysqli_query($conn, $query);
		//$result = $conn->query($query);
    if(mysqli_num_rows($result) > 0)
		{
			
    
 		while($row1 = mysqli_fetch_assoc($result))
 		{
			$output .= '
			<tr>
			  <td>'.$row1["title"].'</td>
			  <td>'.$row1["description"].'</td>
			  <td>'.$row1["length"].'</td>
			  <td>'.$row1["rating"].'</td>
			  <td>'.$row1["category"].'</td>
			  <td>'.$row1["total_sales"].'</td>
			 </tr>
			';
 		}
		 return $output;
		}
		else {
			return 'tražena kategorija '.$catName.' ne postoji!';
		}
} 
   $server = new SoapServer(null, 
   array('uri' => "http://test-uri/"));
   $server->addFunction("returnMovies"); 
   $server->handle(); 
?>