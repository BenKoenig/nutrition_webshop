<div class="register">
    <form class="register__container" action="<?php echo BASE_URL; ?>/register/do" method="post">
        <h2 class="register__container--h2">Register</h2>


        <div class="register__container__wrapper">
            <div class="register__container__wrapper__field">
                <label class="sr-only" for="firstname">First Name</label>
                <input class="register__container__wrapper__field__input" placeholder="First Name" type="text" name="firstname" id="firstname" class="form-control">
            </div>

            <div class="register__container__wrapper__field">
                <label class="sr-only" for="lastname">Last Name</label>
                <input class="register__container__wrapper__field__input" placeholder="Last Name" type="text" name="lastname" id="lastname" class="form-control">
            </div>
        </div>

        <div class="register__container__wrapper">
            <div class="register__container__wrapper__field">
                <label class="sr-only" for="email">Email</label>
                <input class="register__container__wrapper__field__input" placeholder="Email" type="text" name="email" id="email" class="form-control">
            </div>

            <div class="register__container__wrapper__field">
                <label class="sr-only" for="username">Username</label>
                <input class="register__container__wrapper__field__input" placeholder="Username" type="text" name="username" id="username" class="form-control">
            </div>
        </div>

        <div class="register__container__wrapper">
            <div class="register__container__wrapper__field">
                <label class="sr-only" for="password">Password</label>
                <input class="register__container__wrapper__field__input" placeholder="Password" type="password" name="password" id="password" class="form-control">
            </div>

            <div class="register__container__wrapper__field">
                <label class="sr-only" for="password_repeat">Repeat Password</label>
                <input class="register__container__wrapper__field__input" placeholder="Repeat Password" type="password" name="password_repeat" id="password_repeat" class="form-control">
            </div>
        </div>

        <div class="register__container__wrapper">
            <div class="register__container__wrapper__field">
                <label class="sr-only" for="adress_1">Adress 1</label>
                <input class="register__container__wrapper__field__input" placeholder="Adress 1" type="text" name="adress_1" id="adress_1" class="form-control">
            </div>

            <div class="register__container__wrapper__field">
                <label class="sr-only" for="adress_2">Adress 2</label>
                <input class="register__container__wrapper__field__input" placeholder="Adress 2" type="text" name="adress_2" id="adress_2" class="form-control">
            </div>
        </div>


        <div class="register__container__wrapper__field">
            <label class="sr-only" for="postal_code">Postal Code</label>
            <input class="register__container__wrapper__field__input" placeholder="Postal Code" type="text" name="postal_code" id="postal_code" class="form-control">
        </div>

        <div class="register__container__wrapper__field">
            <label class="sr-only" for="city">City</label>
            <input class="register__container__wrapper__field__input" placeholder="City" type="text" name="city" id="city" class="form-control">
        </div>

        <div class="register__container__wrapper__field">
            <label class="sr-only" for="country">Country</label>
            <input class="register__container__wrapper__field__input" placeholder="Country" type="text" name="country" id="country" class="form-control">
        </div>

        <button type="submit" class="btn btn--lime">Register</button>

    </form>
</div>