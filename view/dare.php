<?php
require_once '../layout/header.php';
?>
<div class="container">
    <center>
        <div style="margin-bottom:50px;">
            <h2 class="text-warning"><b><?php echo $dare_from; ?>'s dare</b></h2>
            <small><b><i>PS: This dare was generated randomly by <a href="/">Gratify</a></i> 😉 <i>. You can set dare for anyone <a href="../dare/set_dare.php">here</a>.</i></b></small>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-info" style="margin-bottom:50px;">
                    Hey <?php echo $dare_to ?>, here is a you dare for you!<br></p>
                </h5>
                <p class="card-text">
                    <h3 class="text-primary" style="margin-bottom:40px;"><b><?php echo $dare_given; ?></b></h3>
                    <img src="../dare/gif/<?php echo $dare['dare_id']; ?>.gif" class="card-img-top" alt="Card image" style="height:300px; width:80%; object-fit: scale-down;">

            </div>
        </div>
    </center>
    <hr style="margin-top:50px;">
    <h3 class="text-success">Also try these, <?php echo $dare_to; ?>!</h3>
    <div class="card bg-dark text-white" style="margin-top:30px; margin-bottom:50px">
        <!-- <img class="card-img" src="../img/dareGame.jpg" alt="Card image" style="height:200px; object-fit: cover;"> -->
        <a href="../dare/set_dare.php" style="color:white">
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