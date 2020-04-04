<?php
require_once '../layout/header.php';
?>
<div class="container">
    <center>
        <h2><b><?php echo $dare_from; ?>'s dare</b></h2>
        <br>
        Hey <?php echo $dare_to ?>, here is a you dare for you!<br>
        <br><br>
        <h3><?php echo $dare_given; ?></h3>
        <br><br>
    </center>

    <div class="card bg-dark text-white">
        <img class="card-img" src="../img/dareGame.jpg" alt="Card image" style="height:200px; object-fit: cover;">
        <a href="dare/set_dare.php" style="color:white">
            <div class="card-img-overlay">
                <h5 class="card-title">Create a dare</h5>
                <p class="card-text">Set a dare for you special one here. 💓</p>
            </div>
        </a>
    </div>
</div>
<?php
require_once '../layout/footer.php';
?>