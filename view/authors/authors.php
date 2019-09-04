<main>

    <article>

        <div class="container-fluid bg-light" >

            <h2 class="d-inline-block pt-5 pb-3 text-center">Spis autorów</h2>
            <hr/><br>

            <div class="col-10 offset-1">
            <table class="table table-bordered " >

                <thead class="thead-dark">
                <tr>

                    <th>Tytuł</th>
                    <th>Ocena</th>
                    <?php if (Session::get('user')['rola'] == 'admin'): ?>
                        <th width="10%"> </th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>


                <?php foreach ($this->authorList as $key => $author): ?>
                <tr class="tr">
                    <td>

                        <a data-toggle="modal" data-target="#myModal<?php echo $author['id'] ?>" href="#">

                            <div class="row">
                                <div class="col-1">
                                    <img src="img/<?php echo $author['image'] ?>" alt="<?php echo $author['autor'] ?>" class="img-fluid">
                                </div>

                                <div class="text-dark text-decoration-none col-9 text-left">
                                    <h4><?php echo $author['autor'] ?></h4>
                                </div>
                            </div>

                        </a>
                    </td>

                    <td>
                        <div>

                            <p>Ocena: <?php echo $author['ocena'] ?></p>

                        </div>
                    </td>

                    <?php if (Session::get('user')['rola'] == 'admin'): ?>
                    <td>
                        <button class="btn btn-danger btn-xs mb-1 "><a class="text-white" href="<?php echo URL; ?>Authors/editAuthor/<?php echo $author['id'] ?>">Edytuj</a></button>
                        <button class="btn btn-dark btn-xs btn-delete deleteAuthor" value="<?php echo $author['id'] ?>" >Delete</button>
<!--                            <a href="--><?php //echo URL; ?><!--Authors/authorDelete/--><?php //echo $author['id'] ?><!--" OnClick="return confirm('Czy na pewno chcesz usunąć tego autora?');">Usuń</a>-->
                    </td>
                    <?php endif; ?>

                </tr>



                <div id="myModal<?php echo $author['id'] ?>" data-type="author" data-id="<?php echo $author['id'] ?>" class="text-dark modal fade" role="dialog">
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
                                        <h1 class="font-weight-bold"><?php echo $author['autor'] ?></h1>
                                        <hr/>
                                        <h3><b>OCENA: <?php echo $author['ocena'] ?></b></h3>
                                        <p>Liczba ocen: <?php echo $author['count'] ?></p>
                                        <br>
                                        <div class=  "col-10 offset-1 border rounded p-3 my-3 shadow">
                                            <h4>A Ty jak oceniasz tego autora?</h4>
                                            <p class="response text-danger"></p>


                                            <input  type="number" min="1" max="10" id="author" class="col-md-2 offset-md-5 form-control my-2  shadow" name="grade" value="">
                                            <button type="submit" class="col-md-4 btn btn-danger mb-2 addAuthorGrade">Dodaj ocenę</button>


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