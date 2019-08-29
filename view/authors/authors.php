<main>

    <article>

        <div class="container-fluid bg-light" >

            <h2 class="d-inline-block pt-5 pb-3 text-center">Spis autorów</h2>
            <hr/><br>

            <div class="col-10 offset-1">
            <table class="table table-bordered " >

                <thead class="thead-dark">
                <tr>
                    <th width="10%">Img</th>
                    <th>Tytuł</th>
                    <th>Ocena</th>
                    <?php if (Session::get('user')['rola'] == 'admin'): ?>
                        <th> </th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>


                <?php foreach ($this->authorList as $key => $author): ?>
                <tr>
                    <td>
                        <figure >

                            <a data-toggle="modal" data-target="#myModal<?php echo $author['id'] ?>" href="#"><img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>"
                                                                                                                 class="img-fluid"></a>
                        </figure>
                    </td>

                    <td>
                        <div class="col-8 text-left">
                            <h4><?php echo $author['autor'] ?></h4>
                        </div>
                    </td>
                    <td>
                        <div>

                            <p>Ocena: <?php echo $author['ocena'] ?></p>

                        </div>
                    </td>

                    <?php if (Session::get('user')['rola'] == 'admin'): ?>
                    <td>
                        <a href="#">Edytuj</a>
                        <button data-id="author" class="btn btn-danger btn-xs btn-delete delete-url" value="<?php echo $author['id'] ?>" >Delete</button>
<!--                            <a href="--><?php //echo URL; ?><!--Authors/authorDelete/--><?php //echo $author['id'] ?><!--" OnClick="return confirm('Czy na pewno chcesz usunąć tego autora?');">Usuń</a>-->
                    </td>
                    <?php endif; ?>

                </tr>



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
                </tbody>
            </table>
            </div>

        </div>


    </article>

</main>