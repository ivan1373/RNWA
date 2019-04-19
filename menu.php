
        <div class="col-3 col-s-3 menu">
          <ul>
            <li><a <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?> href="index.php">Index</a></li>
            <li><a  <?php if ($CURRENT_PAGE == "Film filter") {?>active<?php }?> href="filmSearch.php">Film filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Actor filter") {?>active<?php }?> href="actorSearch.php">Actor filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "City filter") {?>active<?php }?> href="citySearch.php">City filter</a></li>
          </ul>
        </div>
