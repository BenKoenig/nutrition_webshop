<div class="login-form">
    <form class="login-form__container" action="<?php echo BASE_URL; ?>/register/do" method="post">

        <div class="login-form__container__field">
            <label for="email">Email</label>
            <input class="login-form__container__field__input" type="text" name="email" id="email" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="username">Username</label>
            <input class="login-form__container__field__input" type="text" name="username" id="username" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="password">Password</label>
            <input class="login-form__container__field__input" type="password" name="password" id="password" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="password_repeat">Repeat Password</label>
            <input class="login-form__container__field__input" type="password" name="password_repeat" id="password_repeat" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="firstname">First Name</label>
            <input class="login-form__container__field__input" type="text" name="firstname" id="firstname" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="lastname">Last Name</label>
            <input class="login-form__container__field__input" type="text" name="lastname" id="lastname" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="adress_1">Adress 1</label>
            <input class="login-form__container__field__input" type="text" name="adress_1" id="adress_1" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="adress_2">Adress 2</label>
            <input class="login-form__container__field__input" type="text" name="adress_2" id="adress_2" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="postal_code">Postal Code</label>
            <input class="login-form__container__field__input" type="text" name="postal_code" id="postal_code" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="city">City</label>
            <input class="login-form__container__field__input" type="text" name="city" id="city" class="form-control">
        </div>

        <div class="login-form__container__field">
            <label for="country">Country</label>
            <input class="login-form__container__field__input" type="text" name="country" id="country" class="form-control">
        </div>

        <button type="submit" class="login-form__container--btn">Register</button>

    </form>
</div>
