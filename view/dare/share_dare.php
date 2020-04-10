<?php
require_once '../layout/header.php';
?>
<div class="container">
    <center>
        <h3 style="margin-bottom:50px">Hey <?php echo $dare_from; ?>, share this to <?php echo $dare_to; ?></h3>
        <div style="margin-bottom:20px">
            <small>
                Click on
                <i class="fa fa-clipboard" style="font-size:13px"></i>
                to the link copy
            </small>
        </div>
    </center>
    <div class="input-group" style="margin-bottom: 30px">
        <input type="text" class="form-control" id="linkToBeCopied" value="https://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?>" readonly>
        <div class="input-group-append">

            <button id="copyButton" onClick="copyToClipboard()" class="input-group-text">
                <i class="fa fa-clipboard"></i>
            </button>
        </div>
    </div>
    <center>
        <a href="whatsapp://send?text=Hey <?php echo $dare_to; ?>, the dare is inside this link! https://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?>" data-action="share/whatsapp/share" class="btn btn-success" style="color: white"><i class="fa fa-whatsapp"></i> Share via Whatsapp</a>
    </center>
</div>
<script>
    function copyToClipboard() {
        linkToBeCopied = document.getElementById("linkToBeCopied")

        linkToBeCopied.select()
        linkToBeCopied.setSelectionRange(0, 99999)

        document.execCommand("copy");
    }
</script>
<?php
require_once '../layout/footer.php';
?>