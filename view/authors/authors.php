<main>

    <article>

        <div class="container-fluid bg-light" >

            <h2 class="d-inline-block pt-5 pb-3 text-center">Spis autorów</h2>
            <hr/><br>

            <?php foreach ($this->authorList as $key => $author): ?>
                <div class="row col-lg-8 col-sm-10 offset-lg-2 offset-sm-1">
                    <div class="col-1 rounded">
                        <figure>

                            <a data-toggle="modal" data-target="#myModal<?php echo $author['id'] ?>" href="#"><img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>"
                                                                                                                 class="img-fluid"></a>
                        </figure>
                    </div>

                    <div class="col-8 text-left">
                        <h4><?php echo $author['autor'] ?></h4>
                    </div>

                    <div>

                        <p>Ocena: <?php echo $author['ocena'] ?></p>

                    </div>

                    <?php if (Session::get('user')['rola'] == 'admin'): ?>

                        <div class="col-1">
                            <a href="#">Edytuj</a>
                            <a href="<?php echo URL; ?>Authors/authorDelete/<?php echo $author['id'] ?>" OnClick="return confirm('Czy na pewno chcesz usunąć tego autora?');">Usuń</a>
                        </div>

                    <?php endif; ?>

                </div>



                <div id="myModal<?php echo $author['id'] ?>" data-type="author" data-id="<?php echo $author['id'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-lg-3">
                                        <img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>" class="img-fluid">
                                    </div>

                                    <div class="col-lg-9">
                                        <h1><?php echo $author['autor'] ?></h1>
                                        <hr/>
                                        <p>OCENA: <?php echo $author['ocena'] ?></p>
                                        <p class="response"></p>
                                        <br>
                                        <h4>A Ty jak oceniasz tego autora?</h4>
                                        <div class="col-md-3 offset-4" >
<!--                                            <form action="--><?php //echo URL; ?><!--Authors/authorGradeAdd/--><?php //echo $author['id'] ?><!--" method="post">-->

                                            <input  type="number" min="1" max="10" id="author" class="form-control mb-2 mr-sm-2" name="grade" value="">
                                                <button type="submit" class="btn btn-danger mb-2 addGrade">Dodaj ocenę</button>
<!--                                            </form>-->
                                        </div>
                                        <hr/>
                                    </div>

                                </div><br>

<!--                                <script>-->
<!--                                    $(document).ready(function(){-->
<!--                                        $("#slide").click(function(){-->
<!--                                            $("#opis").slideToggle("slow");-->
<!--                                        });-->
<!--                                    });-->
<!--                                </script>-->
<!---->
<!--                                <button id="slide">Pokaż opis</button>-->
<!--                                <div id="opis">--><?php //echo $author['opis'] ?><!--</div>-->

<!--                                <button data-toggle="collapse" data-target="#slide--><?php //echo $author['id'] ?><!--" >Pokaż opis</button>-->
<!--                                <div id="slide--><?php //echo $author['id'] ?><!--" class="collapse">--><?php //echo $author['opis'] ?><!--</div>-->

                                <button class="showDesc">Pokaż opis</button>
                                <div class="showDesc" style="display: none;"><?php echo $author['opis'] ?></div>


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

    </article>

</main>