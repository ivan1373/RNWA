<?php include("../config.php");
    require('../db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include_once('../head.php');
  ?>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>

        <?php
            require('../navbar.php');
            require('../menu.php');
        ?>
        
        <div class="row">
        <div class="col-6 col-s-9">
        <form method="POST" action="">
        <label>Pretražite filmove po kategoriji i broju</label><br>
              <input id="naziv" type="text" name="kat" placeholder="unesite kategoriju..."><br><br>
              <input id="naziv1" type="text" name="broj" placeholder="unesite broj..."><br><br>
              <hr>
                <button type="submit" id="filter">Pretraga</button>
                <br><br>
        </form>
        <table id="result">
        <thead>
            <tr>
			<th>Title</th>
			<th>Description</th>
	    	<th>Length</th>
	    	<th>Rating</th>
	       	<th>Category</th>
	    	<th>Sales</th>
	  		</tr>
        </thead>
        <tbody> 
        <?php 
    $naziv=$_POST['kat'];
    $num=$_POST['broj'];
   $client = new SoapClient(null, array(
      'location' => "http://localhost/rnwa/servisi/bezWsdlServer.php",
      'uri'      => "http://test-uri/"));
   $return = $client->returnMovies($naziv,$num);
   	echo $return;
   	
?>
          </tbody>
          </table>
        </div>
        </div>
        <?php
            require('../footer.php');
        ?>
    
</body>
</html>