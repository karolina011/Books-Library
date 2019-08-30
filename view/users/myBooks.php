

<div class="row col-10 offset-1 my-5 text-center">
    <div class="bg-white col-s-12 col-md-5 py-5 rounded">

        <h3>Chcę przeczytać</h3>

        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th width="15%">Opcje</th>
            </tr>
            </thead>
            <tbody>

                <?php foreach ($this->getUserBooks as $key => $book) :?>

                    <?php if ($book['isRead'] == 0): ?>

                        <tr >

                            <td class="d-inline-table  align-middle"><?php echo $book['tytul'] ?></td>
                            <td class="d-inline-table  align-middle"><?php echo $book['autor'] ?></td>
                            <td>
                                <button class="btn btn-danger btn-xs btn-delete delete-url" data-id="bookUserDelete" value="<?php echo $book['id'] ?>" >Delete</button>
                                <button class="btn btn-dark btn-xs btn-delete delete-url" data-id="bookUserChange" value="<?php echo $book['id'] ?>" >Przeczytane</button>
                            </td>

                        </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>

    <div class=" bg-white col-s-12 col-md-5 py-5 offset-2 rounded">

        <h3>Przeczytane</h3>

        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Opcje</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($this->getUserBooks as $key => $book) :?>

                <?php if ($book['isRead'] == 1): ?>

                    <tr>

                        <td class="d-inline-table  align-middle"><?php echo $book['tytul'] ?></td>
                        <td class="d-inline-table  align-middle"><?php echo $book['autor'] ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs btn-delete delete-url" data-id="bookUserDelete" value="<?php echo $book['id'] ?>" >Delete</button>
                        </td>

                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

            </tbody>
        </table>

    </div>


</div>