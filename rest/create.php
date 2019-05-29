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
        <label>Unesite podatke za novog korisnika</label><br>
        <input id="first" type="text"><br><br>
        <input id="last" type="text"><br><br>
        <button>STVORI</button>
        <h1 id="result">

        </h1>
    </div>

</div>


<?php
require('../footer.php');
?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            let first = $('#first').val();
            let last = $('#last').val();
            $("#result").empty();
            $.ajax({
                url:"http://localhost/rnwa/v1/actors",
                method:"POST",
                data:JSON.stringify({
                    first_name: first,
                    last_name: last
                }),
                dataType: "json",
                success:function(data)
                {
                    let poruka = `${data.status}, ${data.status_message}`;
                    $("#result").html(poruka);
                }
            });

        });
    });
</script>
</body>
</html>