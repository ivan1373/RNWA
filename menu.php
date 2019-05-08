
        <?php
          require('config.php');
          ?>
        <div class="col-3 col-s-3 menu">
          <ul>
            <li><a <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?> href="http://localhost/rnwa/index.php">Index</a></li>
            <li><a  <?php if ($CURRENT_PAGE == "Film filter") {?>active<?php }?> href='http://localhost/rnwa/filmSearch.php'>1. zadatak - Film filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Actor filter") {?>active<?php }?> href="http://localhost/rnwa/actorSearch.php">1. zadatak - Actor filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "City filter") {?>active<?php }?> href="http://localhost/rnwa/citySearch.php">1. zadatak - City filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "City filter") {?>active<?php }?> href="http://localhost/rnwa/servisi/wsdlServis.php">2. zadatak - WSDL</a></li>
            <li><a <?php if ($CURRENT_PAGE == "City filter") {?>active<?php }?> href="http://localhost/rnwa/servisi/bezWSDL.php">2. zadatak - Bez WSDL</a></li>
          </ul>
        </div>
