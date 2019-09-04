

<div class="row col-12 col-sm-10 offset-sm-1 my-5 text-center">
    <div class="bg-white p-1 col-sm-10 col-md-8 col-lg-5 py-5 offset-sm-1 offset-md-2 offset-lg-0 rounded">

        <h3>Chcę przeczytać</h3>

        <table class="table table-bordered my-5">
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
                                <button class="btn btn-danger col-md-10 btn-delete deleteUserBook" data-id="bookUserDelete" value="<?php echo $book['id'] ?>" >Delete</button>
                                <button class="btn btn-dark col-md-10 updateRead" data-title="<?php echo $book['tytul'] ?>" data-author="<?php echo $book['autor'] ?>" value="<?php echo $book['id'] ?>" >Przeczytane</button>
                            </td>

                        </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>

    <div class=" bg-white col-s-12 p-1 mt-4 mt-lg-0 col-sm-10 col-md-8 col-lg-5  offset-sm-1 offset-md-2 rounded">

        <h3>Przeczytane</h3>

        <table class="isRead table table-bordered mt-5">
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
                            <button class="btn btn-danger btn-xs btn-delete deleteUserBook"  value="<?php echo $book['id'] ?>" >Delete</button>
                        </td>

                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

            </tbody>
        </table>

    </div>


</div>