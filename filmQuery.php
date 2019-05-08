<?php
require('db.php');
$output = '';
$searchName = '';
$searchCat = '';
$searchRating = '';
if(isset($_POST['name']))
{
 $searchName = mysqli_real_escape_string($conn, $_POST['name']);
 $searchCat = mysqli_real_escape_string($conn, $_POST['category']);
 $searchRating = mysqli_real_escape_string($conn, $_POST['rating']);
 $query = "SELECT * FROM sakila.film_list
WHERE title LIKE '%".$searchName."%'
  AND category = '".$searchCat."' 
  AND rating = '".$searchRating."'
 ";}
else
{
    $searchCat = mysqli_real_escape_string($conn, $_POST['category']);
    $searchRating = mysqli_real_escape_string($conn, $_POST['rating']);
 $query = "SELECT * FROM sakila.film_list
            WHERE category = '".$searchCat."' 
            AND rating = '".$searchRating."''";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <thead>
   <tr>
     <th>ID</th>
     <th>Title</th>
     <th>Description</th>
     <th>Category</th>
     <th>Price</th>
     <th>Length</th>
     <th>Rating</th>
     <th>Actors</th>
    </tr>
  </thead>';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td data-label='.'ID'.'>'.$row1["FID"].'</td>
    <td data-label='.'Title'.'>'.$row1["title"].'</td>
    <td data-label='.'Description'.'>'.$row1["description"].'</td>
    <td data-label='.'Category'.'>'.$row1["category"].'</td>
    <td data-label='.'Price'.'>'.$row1["price"].'</td>
    <td data-label='.'Length'.'>'.$row1["length"].'</td>
    <td data-label='.'Rating'.'>'.$row1["rating"].'</td>
    <td data-label='.'Actors'.'>'.$row1["actors"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Traženi film ne postoji';
}
?>