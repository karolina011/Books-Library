<?php

?>

<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ksiazki</title>
    <meta name="description" content="O czym">
    <meta name="keywords" content="slowa kluczowe">
    <meta name="author" content="Jan Kowalski">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="<?php echo URL;?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>ksiazki.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php echo URL;?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>js/custom.js"></script>
    <script src="<?php echo URL;?>js/myJs.js"></script>
    <script src="<?php echo URL;?>js/bootstrap.min.js"></script>

    <script type="text/javascript">

        function odliczanie() {
            var dzisiaj = new Date();

            var dzien = dzisiaj.getDate();
            if (dzien < 10) {
                dzien = "0" + dzien;
            }

            var miesiac = dzisiaj.getMonth() + 1;
            if (miesiac < 10) {
                miesiac = "0" + miesiac;
            }

            var rok = dzisiaj.getFullYear();
            var godzina = dzisiaj.getHours();
            if (godzina < 10) {
                godzina = "0" + godzina;
            }

            var minuta = dzisiaj.getMinutes();
            if (minuta < 10) {
                minuta = "0" + minuta;
            }

            var sekunda = dzisiaj.getSeconds();
            if (sekunda < 10) {
                sekunda = "0" + sekunda;
            }

            document.getElementById("zegar").innerHTML = dzien + " / " + miesiac + " / " + rok + " | " + godzina + ":" + minuta + ":" + sekunda;

            setTimeout("odliczanie()", 1000);
        }


    </script>

    <!--[if lt IE 9]>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <![endif]-->

</head>

<body onload="odliczanie();">


<header>

    <h1>Reading.com</h1>

</header>

<nav class="navbar sticky-top navbar-dark navbar-expand-md bg-dark">


    <a class="navbar-brand" href="<?php echo URL; ?>Index">
        <!--            <img src="img/logoo.png" class="d-inline-block mr-2" alt="" width="40px" height="30px">-->
        <img class="d-inline-block mr-2" src="https://www.freeiconspng.com/uploads/book-png-3.png" width="40px"
             height="30px" alt="Book Transparent Png Background"/>
        Reading.com
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu"
            aria-expanded="false" aria-label="przelaznik nawigacji">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainmenu">

        <ul class="navbar-nav mr-md-auto">

            <li class="nav-item">

                <a class="nav-link" href="<?php echo URL; ?>Index">Strona główna</a>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                   id="submenu" aria-haspopup="true">Książki</a>

                <div class="dropdown-menu" aria-labelledby="submenu">

                    <a class="dropdown-item" href="<?php echo URL; ?>Books/filterBooksView">Baza książek</a>
                    <a class="dropdown-item" href="#">Nowości</a>
                    <a class="dropdown-item" href="#">Top 50</a>

                </div>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                   id="submenu" aria-haspopup="true">Autorzy</a>

                <div class="dropdown-menu" aria-labelledby="submenu">

                    <a class="dropdown-item" href="<?php echo URL; ?>Authors">Spis autorów</a>
                    <a class="dropdown-item" href="#">Top 50</a>

                </div>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                   id="submenu" aria-haspopup="true">Link 4</a>

                <div class="dropdown-menu" aria-labelledby="submenu">

                    <a class="dropdown-item" href="#">podlink 1</a>
                    <a class="dropdown-item" href="#">podlink 2</a>
                    <a class="dropdown-item" href="#">podlink 3</a>

                </div>
            </li>

        </ul>

        <form class="form-inline" action="#" method="post">

            <input class="form-control mr-sm-2" type="text" value="" name="search" placeholder="Search">
            <button class="btn btn-color" type="submit">Search</button>

        </form>

        <?php if (Session::get('loggedIn') == true): ?>

        <ul class="navbar-nav mr-md-3">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                   id="submenu" aria-haspopup="true">Mój profil</a>

                <div class="dropdown-menu" aria-labelledby="submenu">

                    <?php if (Session::get('user')['rola'] == 'user') :?>
                        <a class="dropdown-item" href="<?php echo URL; ?>Books/myBooks">Moje ksiazki</a>
                        <a class="dropdown-item" href="<?php echo URL; ?>Books/addBookView">Zaproponuj książkę</a>
                        <a class="dropdown-item" href="#">podlink 3</a>
                    <?php endif; ?>
                    <?php if (Session::get('user')['rola'] == 'admin') :?>
                        <a class="dropdown-item" href="#">Wiadomości</a>
                        <a class="dropdown-item" href="<?php echo URL; ?>Books/acceptBookView">Do zaakceptowania</a>
                        <a class="dropdown-item" href="#">podlink 5</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo URL; ?>Auth/logout">Wyloguj</a>

                </div>
            </li>
        </ul>

<!--            <form action="--><?php //echo URL; ?><!--Logout"">-->
<!--            <input class="form-control mr-sm-2" type="submit" value="Wyloguj">-->
<!--            </form>-->
        <?php else: ?>
            <form action="<?php echo URL; ?>Auth/loginView"">
            <input class="form-control mx-md-2" type="submit" value="Zaloguj się">
            </form>

        <?php endif; ?>


        <!--        <p><a href="--><?php //echo URL; ?><!--Login">Zaloguj się</a> </p>-->


    </div>

</nav>

