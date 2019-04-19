<?php include("config.php");
    require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once('head.php');
  ?>
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
 $('#filter').click(function(){
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
    
</body>
</html>