
<div class="col-10 offset-1 my-5 p-5 bg-white text-center rounded ">

    <h3>Pozycje wymagające Twojej akceptacji:</h3>

    <hr/>

    <div class=" col-10 my-5 offset-1 text-left">

        <table class="table table-bordered ">

            <thead class="thead-dark">
                <tr>
                    <th>Lp</th>
                    <th>Autor</th>
                    <th>Tytuł</th>
                    <th> </th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($this->getBooks as $key => $book): ?>

                    <tr>
                        <td>Pozycja 1</td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['title']; ?></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Szczegóły</button></td>
                    </tr>

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Pozycja 1</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p><b>Autor: </b><?php echo $book['author']; ?></p>
                                    <p><b>Tytuł: </b><?php echo $book['title']; ?></p>
                                    <p><b>Rok wydania: </b><?php echo $book['year']; ?></p>
                                    <p><b>Gatunek: </b><?php echo $book['type']; ?></p>
                                    <p><b>Opis: </b><?php echo $book['description']; ?></p>


                                        <button type="submit" class="btn btn-danger"><a class="text-white" href="<?php echo URL; ?>Books/acceptBook/<?php $book['id']; ?>">Zaakceptuj</a></button>
                                        <button type="submit" class="btn btn-dark"><a class="text-white" href="#">Odrzuć</a></button>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; die;?>

            </tbody>
        </table>




        <div class="col-md-5 py-3 bg-white shadow rounded">

            <h4>Pozycja 1</h4>

            <hr/>
            <p>Autor:</p>
            <p>Tytuł:</p>
            <p>Rok wydania:</p>
            <p>Gatunek:</p>
            <p>Opis:</p>

            <button type="button" class="btn btn-danger">Zaakceptuj</button>
            <button type="button" class="btn btn-dark">Odrzuć</button>

        </div>

        <div class="col-md-5 offset-2 py-3 bg-white shadow rounded">

            <h4>Pozycja 2</h4>

            <hr/>
            <p>Autor:</p>
            <p>Tytuł:</p>
            <p>Rok wydania:</p>
            <p>Gatunek:</p>
            <p>Opis:</p>

            <button type="button" class="btn btn-danger">Zaakceptuj</button>
            <button type="button" class="btn btn-dark">Odrzuć</button>

        </div>

    </div>

</div>