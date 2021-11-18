<div class="login-form">
    <form class="login-form__container" action="<?php echo BASE_URL; ?>/login/do" method="post">

        <div class="login-form__container__field">
            <label for="username-or-email">Username / Email</label>
            <input class="login-form__container__field__input" type="text" name="username-or-email" id="username-or-email" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="password">Password</label>
            <input class="login-form__container__field__input" type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="login-form__container--btn">Login</button>

    </form>
</div>
