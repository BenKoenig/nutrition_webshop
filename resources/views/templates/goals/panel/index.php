<div class="listing">
    <h1 class="listing__h1">Goals</h1>

    <div class="listing__ul">
        <?php foreach ($goals as $goal) : ?>
            <div class="listing__ul__li">
                <h5><?php echo $goal->name; ?></h5>
                <div class="listing__ul__li__btns">
                    <a class="btn btn--blue"href="<?php echo BASE_URL . '/admin/goals/' . $goal->id . '/edit';?>">Edit</a>
                    <a class="btn btn--red" href="#">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </d>
</div>