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
            <label for="noteMin" class="ml-sm-5 mr-sm-2">Ocena od:</label>
            <select class="form-control mb-2 mr-sm-2" id="noteMin" name="noteMin">

                <?php

                for ($i = 0; $i <= 10; $i++) {

                    if ($i == 0)
                    {
                        echo "<option selected>-</option>";
                    }
                    else
                    {
                        echo "<option> $i </option>";
                    }
                }
                ?>

            </select>

            <label for="noteMax" class="mr-sm-2"> do:</label>
            <select class="form-control mb-2 mr-sm-2" id="noteMax" name="noteMax">

                <?php

                for ($i = 0; $i <= 10; $i++)
                {
                    if ($i == 0)
                    {
                        echo "<option selected>-</option>";
                    }
                    else
                    {
                        echo "<option> $i </option>";
                    }
                }

                ?>

            </select>

            <label for="sort" class="ml-sm-5 mr-sm-2">Sortuj według: </label>
            <select class="form-control mb-2 mr-sm-2" id="sort" name="sort">
                <option>Oceny (od najwyższej)</option>
                <option>Oceny (od najniższej)</option>
                <option>Alfabetu</option>
                <option>Daty wydania (od najstarszej)</option>
                <option>Daty wydania (od najnowszej)</option>
            </select>

        </div>
        <br/>

        <button type="submit" class="btn btn-danger mb-2">Szukaj książki</button>

    </form>

<hr/>

    <?php if (property_exists($this,'filterBooks')):?>

    <div class="my-5">

        <div class="col-10 offset-1">
        <table class="table table-bordered ">

            <thead class="thead-dark">
            <tr>
                <th> </th>
                <th>Ocena</th>
                <?php if (Session::get('user')['rola'] == 'admin'): ?>
                     <th> </th>
                <?php endif; ?>
            </tr>
            </thead>

            <tbody>

        <?php foreach ($this->filterBooks as $key => $book):?>


        <tr class="tr">
            <td >
                <a class="filtercs" data-toggle="modal" data-target="#myModal<?php echo $book['id'] ?>" href="#">
                    <div class="row">
                        <div class="col-2 ">
                            <img src="<?php echo URL;?>img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>"
                                                                                                             class="img-fluid">
                        </div>
                        <div class="text-dark text-decoration-none col-8 text-left">
                            <h3 class=" font-weight-bold "><?php echo $book['tytul'] ?></h3>
                            <p><b>Autor:</b> <?php echo $book['autor'] ?></p>
                            <p><b>Rok wydania:</b> <?php echo $book['datawydania'] ?></p>
                            <p><b>Gatunek:</b> <?php echo $book['gatunek'] ?></p>
                        </div>
                    </div>
                </a>

            </td>
            <td>
                <div>

                    <p>Ocena: <?php echo $book['ocena'] ?></p>

                </div>
            </td>
                <?php if (Session::get('user')['rola'] == 'admin'): ?>
                <td>
                    <button class="btn btn-dark btn-xs btn-delete deleteBook" value="<?php echo $book['id'] ?>" >Delete</button>
                    <button class="btn btn-danger btn-xs "><a class="text-white" href="<?php echo URL; ?>Books/editBookView/<?php echo $book['id'] ?>">Edytuj</a></button>
<!--                    <div class="col-1" >-->
<!--                        <a href="--><?php //echo URL; ?><!--Books/editBook/--><?php //echo $book['id'] ?><!--">Edytuj</a>-->
<!--                        <a class="delete" data-id="--><?php //echo $book['id'] ?><!--" href="--><?php //echo URL; ?><!--Books/deleteBook/--><?php //echo $book['id'] ?><!--" OnClick="return confirm('Czy na pewno chcesz usunąć tę książkę?');">Usuń</a>-->
<!--                    </div>-->
                </td>
                <?php endif; ?>

        </tr>




            <div id="myModal<?php echo $book['id'] ?>" data-type="book" data-id="<?php echo $book['id'] ?>" class="text-dark modal fade" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?php echo $book['tytul'] ?></h4>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-lg-4">

                                    <img  width="100%" src="<?php echo URL;?>img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>" class="my-3 img-fluid">

                                </div>

                                <div class="col-lg-8 text-center">
                                    <p><b>Autor:</b> <?php echo $book['autor'] ?></p>
                                    <p><b>Rok wydania:</b> <?php echo $book['datawydania'] ?></p>
                                    <p><b>Gatunek:</b> <?php echo $book['gatunek'] ?></p>
                                    <hr/>
                                    <h3><b>OCENA: <?php echo $book['ocena'] ?></b></h3>
                                    <p>Liczba ocen: <?php echo $book['count'] ?> </p>

                                    <div class=  "col-10 offset-1 border rounded p-3 my-3 shadow">
                                        <h4>A Ty jak oceniasz tę książkę?</h4>

                                            <p class="response text-danger"></p>

                                            <input  type="number" min="1" max="10" class="col-md-4 offset-md-4 form-control my-2  shadow" name="grade" value="">
                                            <button type="submit" class="col-md-6 btn btn-danger mb-2 addBookGrade">Dodaj ocenę</button>

                                    </div>
                                    <hr/>
                                </div>

                            </div><br>

                            <div class="text-center">

                                <?php if (Session::get('user')) :?>
                                    <p class="response1 text-secondary"></p>
                                    <div class="row mb-3">
                                        <button type="submit" class="col-md-3 mr-2 offset-3 btn btn-light toRead"><i class="fas fa-book"></i> Chcę przeczytać</button>
                                        <button type="submit" class="col-md-3 btn btn-light read"><i class="fas fa-star"></i> Przeczytane</button>
                                    </div>
                                <?php endif; ?>

                                <button class="btn btn-secondary showDesc" >Pokaż opis</button>
                                <div class="showDesc m-4" style="display: none;"><?php echo $book['opis'] ?></div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        <?php endforeach ?>
            </tbody>
        </table>
        </div>

    </div>

    <?php endif; ?>

</div>