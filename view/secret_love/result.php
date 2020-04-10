<?php
require_once '../layout/header.php';
?>
<div class="container">
    <center>
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-primary">Hey, <b><?php echo $name; ?>!</b></h2>
                    <hr>
                    <h3 class="card-title text-success">Your secret lover is your <br><br><b>" <?php echo $secret_lover; ?> "</b></h3>
                    <p class="card-text text-info" style="margin-top:40px; margin-bottom:5px"><?php echo $body_content; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="../../secret_love/gif/<?php echo $gif_file_name; ?>" style="height:300; width:90% ;object-fit: scale-down;">
            </div>
        </div>
</div>
</div>
<?php
require_once '../layout/footer.php';
?>