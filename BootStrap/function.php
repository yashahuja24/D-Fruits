<?php
function my_alert($color,$msg)
{
   ?>
    <div style="position:absolute; right:20px; bottom:2px;"  id="alert" class="alert alert-<?php echo $color ?> alert-dismissible fade show" role="alert">
<?php echo $msg ?>
<button type="button" id="alert" class="btn-close" style="z-index: 1;" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<script>
    setTimeout(function() {
        boostrap.Alert.getOrCreateInstance(document.querySelector(".alert")).close();
    },1500)
</script>
<?php
}

?>