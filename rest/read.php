<?php include("../config.php");?>
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
?>

<div class="row">
    <?php
    require('../menu.php')
    ?>

    <div class="col-6 col-s-9">
        <label>Prikažite sve actore ili onoga/onu sa željenim ID</label><br>
        <input id="id" name="id" type="text">
        <button>PRIKAŽI</button>
       <ul id="result">

       </ul>
    </div>

</div>


<?php
require('../footer.php');
?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            let id = $('#id').val();
            $("#result").empty();
            $.ajax({
                url:"http://localhost/rnwa/v1/actors",
                method:"GET",
                data:{id:id},
                success:function(data)
                {
                    if(data.length === 0) {
                        let greska = `<li>Korisnik ne postoji!</li>`;
                        $("#result").append(greska);
                    }
                    else {
                        $.each(data, function(i, user){
                            let podatak  = `<li>ID: ${user.actor_id}, First_name: ${user.first_name}, Last_name: ${user.last_name}</li>`;
                            $("#result").append(podatak);
                        });

                    }
                }
            });

    });
    });
</script>
</body>
</html>