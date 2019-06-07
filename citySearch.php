<?php include("config.php");
    require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once('head.php');
include_once('google_oauth_config.php');

?>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
<script>
$(document).ready(function(){
 //load_data();
 function load_data(name, country)
 {
  $.ajax({
   url:"cityQuery.php",
   method:"POST",
   data:{name:name, country:country},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $("input[name=name],#drzava").click(function(){
  var nazivVal = $('#naziv').val();
  var drzavaVal = $('#drzava').val();
  if(nazivVal != '')
  {
   load_data(nazivVal, drzavaVal);
  }
  else if(nazivVal === '')
  {
    load_data('', drzavaVal);
  }
  else
  {
   load_data();
  }
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
              <label>Pretražite gradove po imenu</label><br>
              <input id="naziv" type="text" name="name" placeholder="unesite ime..."><br><br>
              <label>Državi</label><br>
              <select id="drzava" name="country">
              <?php
              
              $sql = "SELECT country_id, country from sakila.country";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row["country_id"].">".$row["country"]."</option>";
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