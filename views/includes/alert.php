<?php if (isset($this->alert)) { ?>
    <div id="alert" class="alert alert-<?= $this->alert['variant'] ?> text-center mt-3" role="alert">
        <?= $this->alert['message'] ?>
    </div>
<?php } ?>
<script>
    // Show the alert with a fading effect
    $('#alert').css('opacity', 0).animate({
        opacity: 1
    }, 500);

    // Hide alert after 5 seconds with a fade effect
    setTimeout(function() {
        $('#alert').animate({
            opacity: 0
        }, 500, function() {
            $(this).css('display', 'none');
        });
    }, 5000);
</script>