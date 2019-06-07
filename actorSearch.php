<?php include("config.php");?>
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
 function load_data(fname, lname)
 {
  $.ajax({
   url:"actorQuery.php",
   method:"POST",
   data:{fname:fname, lname:lname},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $("input[name=fname],input[name=lname]").click(function(){
  var nameVal = $('#fname').val();
  var LnameVal = $('#lname').val();
  if(nameVal != '' && LnameVal == '')
  {
   load_data(nameVal,'');
  }
  else if(nameVal == '' && LnameVal != '')
  {
    load_data('',LnameVal);
  }
  else if(nameVal != '' && LnameVal != '')
  {
    load_data(nameVal, LnameVal);
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
         
              <label>Pretražite glumce po imenu</label><br>
              <input id="fname" type="text" name="fname" placeholder="unesite ime..."><br><br>
              <label>Prezimenu</label><br>
              <input id="lname" type="text" name="lname" placeholder="unesite prezime"><br><hr>
                <button id="filter">Pretraga</button>
                <br><br>
          </form><br>
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