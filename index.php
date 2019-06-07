<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once('head.php');
include_once('google_oauth_config.php');

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

            <?php if (isset($authUrl)): ?>
                <form action="<?php echo $authUrl; ?>" method="post">
                    <button style="border: none;outline: 0;padding: 8px;color: white;background-color: #000;text-align: center;cursor: pointer;font-size: 18px;" type="submit">
                        Login with Google
                    </button>
                </form>
            <?php else: ?>
                <h3>Successfully! Authenticated</h3>
                <div class="card">
                    <img src="<?php echo $profile_image_url.'?sz=100' ?>" alt="John">
                    <h1><?php echo $user_name ?></h1>
                    <p class="title"><?php echo $email ?></p>
                    <p><?php echo $user_id ?></p>
                    <p><form action="?logout=1" method="post">
                        <button type="submit">
                            Logout
                        </button>
                    </form></p>
                </div>
            <?php endif ?>
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