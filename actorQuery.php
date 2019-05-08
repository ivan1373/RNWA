<?php
require('db.php');
$output = '';
$searchFname = '';
$searchLname = '';
if(isset($_POST['fname']) && !(isset($_POST['lname'])))
{
    $searchFname = mysqli_real_escape_string($conn, $_POST['fname']);
 
    $query = "SELECT * FROM sakila.actor_info
    WHERE first_name LIKE '%".$searchFname."%'";
}
else if(!(isset($_POST['lname'])) && isset($_POST['lname']))
 {
    $searchLname = mysqli_real_escape_string($conn, $_POST['lname']);
 
    $query = "SELECT * FROM sakila.actor_info
    WHERE last_name LIKE '%".$searchLname."%'";
 }
else if(isset($_POST['fname']) && isset($_POST['lname']))
{
    $searchFname = mysqli_real_escape_string($conn, $_POST['fname']);
    $searchLname = mysqli_real_escape_string($conn, $_POST['lname']);
 
    $query = "SELECT * FROM sakila.actor_info
    WHERE first_name LIKE '%".$searchFname."%'
    AND last_name LIKE '%".$searchLname."%'";
}
else
{
    echo 'Unesite parametre';
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
    <thead>
   <tr>
     <th>ActorID</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Films</th>
    </tr>
    </thead>';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td data-label='.'ID'.'>'.$row1["actor_id"].'</td>
    <td data-label='.'First Name'.'>'.$row1["first_name"].'</td>
    <td data-label='.'Last Name'.'>'.$row1["last_name"].'</td>
    <td data-label='.'Films'.'>'.$row1["film_info"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Traženi glumac ne postoji';
}
?>