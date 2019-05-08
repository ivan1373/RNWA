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
        <label>Pretražite filmove po imenu</label><br>
              <input id="naziv" type="text" name="name" placeholder="unesite ime..."><br><br>
              <hr>
                <button type="submit" id="filter">Pretraga</button>
                <br><br>
        </form>
        <table id="result">
        <?php

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);
  //$sClient = new SoapClient('http://localhost/test/wsdl/hello.xml,);
  $sClient = new SoapClient('http://localhost/rnwa/servisi/film.wsdl',
  array(
    'cache_wsdl'=>WSDL_CACHE_NONE,
    'trace'=>1,
    'user' => 'root',
    'pass' => '',
    'exceptions' => 0
  )
							);
  //$sClient = new SoapClient('hello.wsdl');
  if(isset($_REQUEST['name']))
  {
    $filmName = $_REQUEST['name'];
  $response = $sClient->findActors($filmName);
  print($response);
  //echo $filmName;
  //return $response;
  //var_dump($x->__getLastResponseHeaders());
	//var_dump($sClient->__getLastResponse());
$sClient->__getLastResponse();
  //var_dump($response);
  //$functions = $sClient->__getFunctions ();
//var_dump ($functions);
  }
   
  
  
  
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
}
{
    print($sClient->__getLastResponse());
}
?>
          
          </table>
        </div>
        </div>
        <?php
            require('../footer.php');
        ?>
    
</body>
</html>