<div class="register col-md-4 col-s-8 offset-md-4 offset-sm-2 my-5 py-4 text-center rounded ">

<h1>LOGOWANIE</h1>

<form action="<?php echo URL; ?>Auth/login" method="post">

    <label for="login">Login</label>
    <input type="text" name="login" id="login" value=""><br>

    <label for="password1">Hasło</label>
    <input type="password" name="password1" id="password1" value="">
    <?php
    if(isset($_SESSION['errLogin']))
    {
        echo '<div class="text-danger">' .$_SESSION['errLogin'].'</div>';
        unset($_SESSION['errLogin']);
    }
    ?><br/>

    <input type="submit" value="Zaloguj">
</form>

<p>Nie masz jeszcze konta? <a href="<?php echo URL; ?>Auth/registerView">Zarejestruj się</a></p>

</div>