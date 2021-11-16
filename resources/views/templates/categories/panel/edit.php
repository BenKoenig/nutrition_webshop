<!-- @todo: implement helper function for BASE_URL url generation -->
<form action="<?php echo BASE_URL . "/categories/{$room->id}/update" ?>" method="post">

    <div>
        <label for="name"></label>
        <input type="text" name="name" placeholder="Name" value="Name">

    </div>

    <!-- @todo: implement room feature dropdown -->

    <div">
        <button type="submit">Save</button>
        <a href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
    </div>

</form>


<div class="create">
    <h1>Edit Category</h1>
    <div class="create__path">
        <a class="create__path__a" href="<?php echo BASE_URL . "/admin" ?>">Admin/</a>
        <a class="create__path__a" href="<?php echo BASE_URL . "/admin/categories" ?>">Categoies/</a>
        <p>Edit</p>
    </div>
    <form class="create__form" action="<?php echo BASE_URL . "/admin/categories/" . $categorie->id . "/edit/update" ?>" method="post">
        <div class="create__form__field">
            <label class="create__form__field__label" for="name">Category Name</label>
            <input class="create__form__field__input" type="text" name="name" id="name" value="<?php
                echo $categorie->name; ?>">
        </div>
        <div class="create__form__field">
            <label class="create__form__field__label" for="img_url">Image Path</label>
            <input class="create__form__field__input" type="text" name="img_url" id="img_url" value="<?php
                echo $categorie->img_url; ?>">
        </div>
        <div class="create__form__field create__form__field--checkfield">
            <label class="create__form__field__label" for="is_popular">Add to popular section</label>
            <input type="checkbox" name="is_popular" id="is_popular" <?php echo $categorie->is_popular?"checked":"" ;?>>
        </div>
        <div class="create__form__btns">
            <button class="create__form__btns--create" type="submit">Update Category</button>
            <a class="create__form__btns--cancel" href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>