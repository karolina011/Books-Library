

<div class="register col-md-4 col-s-8 offset-md-4 offset-sm-2 my-5 py-4 text-center rounded ">

    <h1>REJESTRACJA</h1>

    <hr/>

    <form action="<?php echo URL; ?>Auth/register" method="post">

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="<?php echo ($_SESSION['registerData']['login']) ?? ""?>"><br>
            <?php
            if(isset($_SESSION['errLogin']))
            {
                echo '<div class="text-danger">' .$_SESSION['errLogin'].'</div>';
                unset($_SESSION['errLogin']);
            }

            ?>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo ($_SESSION['registerData']['email']) ?? ""?>"><br>
            <?php
            if(isset($_SESSION['errEmail']))
            {
                echo '<div class="text-danger">' .$_SESSION['errEmail'].'</div>';
                unset($_SESSION['errEmail']);
            }
            ?>
        </div>

        <div class="form-group">
            <label for="password1">Hasło</label>
            <input type="password" name="password1" id="password1" value=""><br>
            <?php
            if(isset($_SESSION['errPassword']))
            {
                echo '<div class="text-danger">' .$_SESSION['errPassword'].'</div>';
                unset($_SESSION['errPassword']);
            }
            ?>
        </div>

        <div class="form-group">
            <label for="password2">Powtórz hasło</label>
            <input type="password" name="password2" id="password2" value=""><br><br>
        </div>

        Płeć:
        <div class="radio">
            <input type="radio" name="gender" id="male" value="male">
            <label for="male">Mężczyzna</label><br>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">Kobieta</label>
            <?php
            if(isset($_SESSION['errGender']))
            {
                echo '<div class="text-danger">' .$_SESSION['errGender'].'</div>';
                unset($_SESSION['errGender']);
            }
            ?><br/>
        </div>

        <div class="checkbox">
            <input type="checkbox" name="accept" id="accept" value="">
            <label for="accept">Akceptuję regulamin</label>
            <?php
            if(isset($_SESSION['errAccept']))
            {
                echo '<div class="text-danger">' .$_SESSION['errAccept'].'</div>';
                unset($_SESSION['errAccept']);
            }
            ?><br/>
        </div>

        <input type="submit" class="btn btn-defaul value="Zarejestruj się">

    </form>
</div>