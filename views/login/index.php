<form class="form-signin" role="form" method="post" action="<?php echo URL; ?>login/run">
    <h2 class="form-signin-heading">Zaloguj się</h2>

    <?php if (isset($this->error)): ?>
        <h3 class="form-signin-heading" style="color:red;"><?php echo $this->error; ?></h3>
    <?php endif; ?>    

    <input type="text" class="form-control" name="admlogin" placeholder="Login" required autofocus>
    <input type="password" class="form-control" name="admpassword" placeholder="Hasło" required>
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Pamiętaj mnie
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Potwierdź</button>
</form>