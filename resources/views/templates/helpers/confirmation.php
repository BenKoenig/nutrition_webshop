<div class="confirm">
    <div class="confirm__container">
        <div>
            <h3>Are you sure you want the delete <?php echo $objectType; ?> "<?php echo $objectTitle; ?>"?</h3>
        </div>
        <div class="confirm__container__btns">
            <a href="<?php echo $confirmUrl; ?>" class="btn btn--red">Yes</a>
            <a href="<?php echo $abortUrl; ?>" class="btn btn--gray">Cancel</a>
        </div>
    </div>
</div>