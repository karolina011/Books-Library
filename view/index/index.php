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

                    <div id="myModal<?php echo $book['id'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="img/<?php echo $book['image'] ?>" alt="<?php echo $book['tytul'] ?>" class="img-fluid">
                                        </div>
                                        <div class="col-lg-8">
                                            <p>Autor: <?php echo $book['autor'] ?></p>
                                            <p>Rok wydania: <?php echo $book['datawydania'] ?></p>
                                            <p>Gatunek: <?php echo $book['gatunek'] ?></p>
                                            <hr/>
                                            <p>OCENA: <?php echo $book['ocena'] ?></p>
                                        </div>
                                    </div>

                                    <div>

                                        <br>

                                        <p><?php echo $book['opis'] ?></p>

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

                    <div id="Modal<?php echo $author['id']?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>" class="img-fluid">
                                        </div>
                                        <div class="col-lg-8">
                                            <h1><?php echo $author['autor'] ?></h1>
                                            <hr/>
                                            <p>OCENA: <?php echo $author['ocena'] ?></p>
                                        </div>
                                    </div>

                                    <div>

                                        <br>

                                        <p><?php echo $author['opis'] ?></p>

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




