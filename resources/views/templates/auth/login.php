<div class="login-form">
    <h2 class="login-form--h2">Login</h2>
    <form class="login-form__container" action="<?php echo BASE_URL; ?>/login/do" method="post">

        <div class="login-form__container__field">
            <label class="sr-only" for="username-or-email">Username / Email</label>
            <input class="login-form__container__field__input" placeholder="Username or Password" type="text" name="username-or-email" id="username-or-email" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label class="sr-only" for="password">Password</label>
            <input class="login-form__container__field__input" placeholder="Password" type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn--lime">Login</button>

    </form>
</div>
