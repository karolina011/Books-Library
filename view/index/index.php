<?php //echo '<pre>'; print_r($this->books); die;?>

<main>


    <div class="container-fluid">

        <article class="frst">

            <div id="zegar" class="d-inline-block mt-3"></div>
            <div class="w-100"></div>


            <h2 class="d-inline-block pt-5 pb-3 ">Najwyżej oceniane</h2>


            <div class="row">


                <?php foreach ($this->books as $key => $book): ?>
                    <div class="col-lg-2 col-md-4 col-s-10 <?php if ($key == 0): ?>offset-lg-1<?php endif; ?> rounded">
                        <figure>

                            <a data-toggle="modal" data-target="#myModal<?php echo $book['id'] ?>" href="#"><img src="img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>"
                                             class="img-fluid"></a>
                            <figcaption><?php echo $book['tytul'] ?></figcaption>

                        </figure>

                    </div>

                    <div id="myModal<?php echo $book['id'] ?>" data-type="book" data-id="<?php echo $book['id'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo $book['tytul'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>" class="img-fluid">
                                        </div>
                                        <div class="col-lg-8">
                                            <<p><b>Autor:</b> <?php echo $book['autor'] ?></p>
                                            <p><b>Rok wydania:</b> <?php echo $book['datawydania'] ?></p>
                                            <p><b>Gatunek:</b> <?php echo $book['gatunek'] ?></p>
                                            <hr/>
                                            <h3><b>OCENA: <?php echo $book['ocena'] ?></b></h3>
                                            <p>Liczba ocen: <?php echo $book['count'] ?> </p>

                                            <div class=  "col-10 offset-1 border rounded p-3 my-3 shadow">
                                                <h4>A Ty jak oceniasz tę książkę?</h4>

                                                <p class="response text-danger"></p>

                                                <input  type="number" min="1" max="10" class="col-md-2 offset-md-5 form-control my-2  shadow" name="grade" value="">
                                                <button type="submit" class="col-md-4 btn btn-danger mb-2 addGrade">Dodaj ocenę</button>

                                            </div>
                                            <hr/>
                                        </div>
                                    </div>

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

                <?php endforeach; ?>


            </div>


            <h2 class="d-inline-block pt-5 pb-3">Najpopularniejsi autorzy</h2>

            <div class="row">

                <?php foreach ($this->authors as $key => $author): ?>
                    <div class="col-lg-2 col-md-4 col-s-10 <?php if ($key == 0): ?>offset-lg-1<?php endif; ?>">
                        <figure>

                            <a data-toggle="modal" data-target="#Modal<?php echo $author['id'] ?>" href="#"><img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>"
                                                                                                                 class="img-fluid"></a>
                            <figcaption><?php echo $author['autor'] ?></figcaption>

                        </figure>

                    </div>

                    <div id="Modal<?php echo $author['id']?>" data-type="author" data-id="<?php echo $author['id'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>" class="img-fluid">
                                        </div>
                                        <div class="col-lg-8">
                                            <h1 class="font-weight-bold"><?php echo $author['autor'] ?></h1>
                                            <hr/>
                                            <h3><b>OCENA: <?php echo $author['ocena'] ?></b></h3>
                                            <p>Liczba ocen: <?php echo $author['count'] ?></p>
                                            <br>
                                            <div class=  "col-10 offset-1 border rounded p-3 my-3 shadow">
                                                <h4>A Ty jak oceniasz tego autora?</h4>
                                                <p class="response text-danger"></p>


                                                    <input  type="number" min="1" max="10" id="author" class="col-md-2 offset-md-5 form-control my-2  shadow" name="grade" value="">
                                                    <button type="submit" class="col-md-4 btn btn-danger mb-2 addGrade">Dodaj ocenę</button>


                                            </div>
                                            <hr/>
                                        </div>
                                    </div>

                                    <div>

                                        <button class="showDesc">Pokaż opis</button>
                                        <div class="showDesc" style="display: none;"><?php echo $author['opis'] ?></div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

<!--                <div class="col-lg-2 col-md-4 col-s-10 offset-lg-1 ">-->
<!---->
<!--                    <figure>-->
<!---->
<!--                        <a href=#><img src="img/stephen-king.jpg" alt="Stephen King" class="img-fluid"></a>-->
<!--                        <figcaption>Stephen King</figcaption>-->
<!---->
<!--                    </figure>-->
<!---->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-2 col-md-4 col-s-10 ">-->
<!---->
<!--                    <figure>-->
<!---->
<!--                        <a href=#><img src="img/rowling.jpg" alt="J.K.Rowling" class="img-fluid"></a>-->
<!--                        <figcaption>Joanne Murray Rowling</figcaption>-->
<!---->
<!--                    </figure>-->
<!---->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-2 col-md-4 col-s-10 ">-->
<!---->
<!--                    <figure>-->
<!---->
<!--                        <a href=#><img src="img/mroz.jpg" alt="Remigiusz Mróz" class="img-fluid"></a>-->
<!--                        <figcaption>Remigiusz Mróz</figcaption>-->
<!---->
<!--                    </figure>-->
<!---->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-2 col-md-4 col-s-10 ">-->
<!---->
<!--                    <figure>-->
<!---->
<!--                        <a href=#><img src="img/stephen-king.jpg" alt="Stephen King" class="img-fluid"></a>-->
<!--                        <figcaption>Stephen King</figcaption>-->
<!---->
<!--                    </figure>-->
<!---->
<!--                </div>-->
<!---->
<!---->
<!--                <div class="col-lg-2 col-md-4 col-s-10 ">-->
<!---->
<!--                    <figure>-->
<!---->
<!--                        <a href=#><img src="img/rowling.jpg" alt="J.K.Rowling" class="img-fluid"></a>-->
<!--                        <figcaption>Joanne Murray Rowling</figcaption>-->
<!---->
<!--                    </figure>-->
<!---->
<!--                </div>-->

            </div>

        </article>


    </div>


</main>




