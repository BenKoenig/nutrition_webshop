<!-- @todo: implement helper function for BASE_URL url generation -->
<form action="<?php
echo BASE_URL . "/categories/{$room->id}/update" ?>" method="post">

    <div>
        <label for="name"></label>
        <input type="text" name="name" placeholder="Name" value="Name">

    </div>

    <!-- @todo: implement room feature dropdown -->

    <div">
        <button type="submit">Save</button>
        <a href="<?php echo BASE_URL . '/categories'; ?>">Cancel</a>
    </div>

</form>
