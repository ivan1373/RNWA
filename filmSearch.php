<?php include("config.php");
    require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include_once('head.php');
include_once('google_oauth_config.php');
  ?>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>  
<body>

<script>
$(document).ready(function(){
 //load_data();
 function load_data(name, category, rating)
 {
  $.ajax({
   url:"filmQuery.php",
   method:"POST",
   data:{name:name, category:category, rating:rating},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $("input[name=name],#kategorija,#ocjena").change(function(){
  var nameVal = $('#naziv').val();
  var katVal = $('#kategorija').val();
  var ocjenaVal = $('#ocjena').val();
  if(nameVal !== '')
  {
   load_data(nameVal, katVal, ocjenaVal);
  }
  else if(nameVal === '')
  {
    load_data('', katVal, ocjenaVal);
  }
  else
  {
   load_data();
  }
  //alert(katVal);
 });
});
</script>
<?php
require('navbar.php');
require('menu.php');
?>
<?php if (isset($authUrl)): ?>
    <h3>You are not allowed to se the content</h3>
    <form action="<?php echo $authUrl; ?>" method="post">
        <button style="border: none;outline: 0;padding: 8px;color: white;background-color: #000;text-align: center;cursor: pointer;font-size: 18px;" type="submit">
            Login with Google
        </button>
    </form>
<?php else: ?>

        <div class="row">
        <div class="col-6 col-s-9">
              <label>Pretražite filmove po imenu</label><br>
              <input id="naziv" type="text" name="name" placeholder="unesite ime..."><br><br>
              <label>Kategoriji</label><br>
              <select id="kategorija" name="category">
              <?php
              
              $sql = "SELECT name from sakila.category order by category_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row["name"].">".$row["name"]."</option>";
                    }
                } else {
                    echo "no categories";
                }
                
                //$conn->close();
                ?>
                </select><br><br>
              <label>Ocjeni</label><br>
              <select id="ocjena" name="rating">
              <?php
              
              $sql = "SELECT distinct rating from sakila.film";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row["rating"].">".$row["rating"]."</option>";
                    }
                } else {
                    echo "no ratings";
                }
                
                $conn->close();
                ?>
                </select><hr>
                <button id="filter">Pretraga</button>
                <br><br>
          <table id="result">

          </table>
        </div>
        </div>
        <?php
            require('footer.php');
        ?>
<?php endif ?>
</body>
</html>