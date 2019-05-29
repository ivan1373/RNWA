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
        <label>Unesite ID za actora kojeg želite izbrisati</label><br>
        <input id="id" type="text"><br><br>
        <button>IZBRISI</button>
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
            let id = $('#id').val();
            $("#result").empty();
            $.ajax({
                url:"http://localhost/rnwa/v1/actors?id=" + id,
                method:"DELETE",
                success:function(data)
                {
                    let poruka = `${data.status}, ${data.status_message}`;
                    $("#result").html(poruka);
                },
                error: function () {
                    console.log('Error in Operation');
                }
            });

        });
    });
</script>
</body>
</html>