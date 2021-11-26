<div class="listing">
    <div class="listing__header">
        <h1 class="listing__h1">Categories</h1>
        <a class="btn btn--lime" href="<?php echo BASE_URL . '/admin/categories/create'; ?>">Create</a>
    </div>


    <div class="panel__header__path">
        <a class="panel__header__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin</a>
        <p>/Categories</p>
    </div>
    <div class="listing__ul">
        <?php foreach ($categories as $category) : ?>
            <div class="listing__ul__li">
                <h5><?php echo $category->name; ?></h5>
                <div class="listing__ul__li__btns">
                    <a class="btn btn--blue" href="<?php echo BASE_URL . '/admin/categories/' . $category->id . '/edit'; ?>">Edit</a>
                    <a class="btn btn--red" href="<?php echo BASE_URL . '/admin/categories/' . $category->id . '/delete'; ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
        </d>
    </div>
</div>