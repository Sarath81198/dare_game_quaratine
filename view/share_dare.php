<?php
require_once '../layout/header.php';
?>
<div class="container">
    <h3>Hey <?php echo $dare_from; ?>, share this to <?php echo $dare_to; ?></h1>
        <div class="input-group">
            <input type="text" class="form-control" id="linkToBeCopied" value="http://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?><br>" disabled>
            <div class="input-group-append">

                <button id="copyButton" onClick="copyToClipboard()" class="input-group-text"><span class="material-icons">
                        assignment
                    </span></button>
            </div>
        </div>
</div>
<script>
    function copyToClipboard() {
        linkToBeCopied = document.getElementById("linkToBeCopied").value;
        console.log(linkToBeCopied);

        linkToBeCopied.select();
        linkToBeCopied.setSelectionRange(0, 99999);

        document.execCommand("copy");
    }
</script>
<?php
require_once '../layout/footer.php';
?>