<div>
    <h2>Create Category</h2>
    <form action="<?php echo BASE_URL . "/admin/categories/create/store" ?>" method="post">
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" placeholder="Protein Shakes">
        </div>
        <div>
            <label for="img_url">Image Path</label>
            <input type="text" name="img_url" id="img_url" placeholder="https://link/example/image.png">
        </div>
        <div>
            <label for="is_popular">Popular</label>
            <input type="checkbox" name="is_popular" id="is_popular">
        </div>
        <div>
            <button type="submit">Create Category</button>
            <a href="<?php echo BASE_URL . '/admin/categories'; ?>">Cancel</a>
        </div>

    </form>
</div>