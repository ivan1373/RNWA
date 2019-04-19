<?php
require('db.php');
$output = '';
$searchName = '';
$searchCntr = '';

if(isset($_POST['name']))
{
 $searchName = mysqli_real_escape_string($conn, $_POST['name']);
 $searchCntr = $_POST['country'];
 
 $query = "SELECT city_id, city, country FROM sakila.city JOIN sakila.country
 ON sakila.city.country_id = sakila.country.country_id
WHERE sakila.city.city LIKE '%".$searchName."%'
  AND sakila.country.country_id = '".$searchCntr."' ";
}
else
{
    $searchCntr = $_POST['country'];
    
 $query = "SELECT city_id, city, country FROM sakila.city JOIN sakila.country
            ON sakila.city.country_id = sakila.country.country_id
            WHERE sakila.country.country_id = '".$searchCntr."'";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
   <tr>
     <th>ID</th>
     <th>City Name</th>
     <th>Country</th>
    </tr>';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td>'.$row1["city_id"].'</td>
    <td>'.$row1["city"].'</td>
    <td>'.$row1["country"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
    $searchName = mysqli_real_escape_string($conn, $_POST['name']);
    $searchCntr = $_POST['country'];
 echo 'Traženi grad ne postoji '.$searchCntr.' '.$searchName;
}
$conn->close();
?>