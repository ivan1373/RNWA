﻿<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include_once('head.php');
  ?>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
        <?php
            require('navbar.php');
        ?>

        <div class="row">
        <?php
          require('menu.php')
        ?>
      

        <div class="col-6 col-s-9">
         <!-- <form method="GET" action="server.php">
              <label>Pretražite djelatnike po imenu</label><br>
              <input type="text" placeholder="unesite ime..."><br><br>
              <label>Prezimenu</label><br>
              <input type="text" placeholder="unesite prezime"><br><br>
              <label>Broju telefona</label><br>
              <input type="number" placeholder="unesite telefon...">
          </form><br>-->
        <h2>Film list</h2>
        <?php
            require('films.php');
        ?>
        </div>
      
      </div>
     
      
      <?php
            require('footer.php');
        ?>
</body>
</html>