<div class="container-fluid bg-light p-5"">

    <h3 class="text-center">Szukaj książki</h3>
    <hr/>

    <form action="<?php echo URL; ?>Books/filterBooksView" method="post">

        <!--        --><?php
        //        if(isset($_SESSION['errBook']))
        //        {
        //            echo '<div class="text-danger">' .$_SESSION['errBook'].'</div>';
        //            unset($_SESSION['errBook']);
        //        }
        //        ?><!--<br>-->
        <div class="form-inline">
            <label for="author" class="mr-sm-2">Autor:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="author" name="author" value="">
            <label for="title" class="mr-sm-2">Tytuł:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="title" name="title" value="">
            <label for="yearMin" class="mr-sm-2">Rok wydania od:</label>
            <input type="number" class="form-control col-1 mb-2 mr-sm-2" id="yearMin" name="yearMin" value="">
            <label for="yearMax" class="mr-sm-2"> do:</label>
            <input type="number" class="form-control col-1 mb-2 mr-sm-2" id="yearMax" name="yearMax" value="">
        </div>

        <div class="form-inline">
            <label for="type" class="mr-sm-2">Gatunek: </label>
            <select multiple class="form-control mb-2 mr-sm-2" id="type" name="type[]">
                <option>Biografia</option>
                <option>Dramat</option>
                <option>Fantasy</option>
                <option>Horror</option>
                <option>Komedia</option>
                <option>Przygodowa</option>
                <option>Romans</option>
                <option>Thriller</option>
            </select>
            <label for="noteMin" class="mr-sm-2">Ocena od:</label>
            <select class="form-control mb-2 mr-sm-2" id="noteMin" name="noteMin">

                <?php

                for ($i = 1; $i <= 10; $i++) {

                    echo "<option> $i </option>";
                }

                ?>

            </select>

            <label for="noteMax" class="mr-sm-2"> do:</label>
            <select class="form-control mb-2 mr-sm-2" id="noteMax" name="noteMax">

                <?php

                for ($i = 1; $i <= 10; $i++)
                {
                    if ($i==10)
                    {
                        echo "<option selected='selected'> $i </option>";
                    }
                    else
                    {
                        echo "<option> $i </option>";
                    }
                }

                ?>

            </select>

        </div>
        <br/>

        <button type="submit" class="btn btn-danger mb-2">Szukaj książki</button>

    </form>

<hr/>

    <?php if (property_exists($this,'filterBooks')):?>

    <div class="my-5">

        <?php foreach ($this->filterBooks as $key => $book):?>

            <div class="row col-lg-8 col-sm-10 offset-lg-2 offset-sm-1">
                <div class="col-1 rounded">
                    <figure>
                        <a data-toggle="modal" data-target="#myModal<?php echo $book['id'] ?>" href="#"><img src="<?php echo URL;?>img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>"
                                                                                                             class="img-fluid"></a>
                    </figure>
                </div>

                <div class="col-8 text-left">
                    <h4><?php echo $book['tytul'] ?></h4>
                </div>

                <div>

                    <p>Ocena: <?php echo $book['ocena'] ?></p>

                </div>

                <?php if (Session::get('user')['rola'] == 'admin'): ?>

                    <div class="col-1">
<!--                        <a href="--><?php //echo URL; ?><!--Books/editBook/--><?php //echo $book['id'] ?><!--">Edytuj</a>-->
                        <a href="<?php echo URL; ?>Books/deleteBook/<?php echo $book['id'] ?>" OnClick="return confirm('Czy na pewno chcesz usunąć tę książkę?');">Usuń</a>
                    </div>

                <?php endif; ?>

            </div>



            <div id="myModal<?php echo $book['id'] ?>" data-type="book" data-id="<?php echo $book['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-lg-3">
                                    <img src="<?php echo URL;?>img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>" class="img-fluid">
                                </div>

                                <div class="col-lg-9 text-center">
                                    <p><b>Autor:</b> <?php echo $book['autor'] ?></p>
                                    <p><b>Rok wydania:</b> <?php echo $book['datawydania'] ?></p>
                                    <p><b>Gatunek:</b> <?php echo $book['gatunek'] ?></p>
                                    <hr/>
                                    <p>OCENA: <?php echo $book['ocena'] ?></p>
                                    <p class="response"></p>
                                    <br>
                                    <h4>A Ty jak oceniasz tę książkę?</h4>
                                    <div class="col-md-3 offset-4" >

                                        <input  type="number" min="1" max="10" class="form-control mb-2 mr-sm-2" name="grade" value="">
                                        <button type="submit" class="btn btn-danger mb-2 addGrade">Dodaj ocenę</button>

                                    </div>
                                    <hr/>
                                </div>

                            </div><br>

                            <button class="showDesc">Pokaż opis</button>
                            <div class="showDesc" style="display: none;"><?php echo $book['opis'] ?></div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        <?php endforeach ?>

    </div>

    <?php endif; ?>

</div>