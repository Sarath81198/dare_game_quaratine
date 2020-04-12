<?php
require_once '../layout/header.php';
require_once '../config.php';
?>
<div class="container">
    <form action="../dare/share_dare.php" method="POST" onSubmit="disableBtn(this)">
        <div class="form-group">
            <label for="dare_from_name">Tell us your name:</label>
            <input type="text" name="dare_from" class="form-control" id="dareFromName" placeholder="Enter your name ..." required>
        </div>
        <div class="form-group">
            <label for="dare_from_name">Tell us the name of the person whom you're going to send our dare to:</label>
            <input type="text" name="dare_to" class="form-control" id="dareToName" placeholder="Enter the dare receiver's name ..." required>
        </div>
        <div class="form-group">
            <label for="typeOfRelation">Enter the type of relation with the receiver: <small><i>(Don't worry we would never expose this to the other person who receives)</i></small></label>
            <select class="form-control" id="type_of_relation" name="type_of_relation" required>
                <option value="Crush">Crush</option>
                <option value="Girlfriend/Boyfriend">Couple</option>
                <option value="Guy/Girl bestfriend">Friend</option>
            </select>
        </div>
        <input type="submit" value="SET DARE" name="set_dare" id="setDare" class="btn btn-outline-warning" />
    </form>
    <center style="margin-top:40px;margin-bottom:50px">
        <hr>
        <a href="whatsapp://send?text=Send me your name and I'll set you a dare! Also set a dare for anyone here:  https://<?php echo $base_URL; ?>/dare/set_dare.php" data-action="share/whatsapp/share" class="btn btn-success" style="color: white"><i class="fa fa-whatsapp"></i> Set a status on Whatsapp</a>
    </center>
</div>

<script>
    function disableBtn(form) {
        form.set_dare.disabled = true
        form.set_dare.value = "Please wait while we set up a dare!"
        return true
    }
</script>
<?php
require_once '../layout/footer.php';
?>