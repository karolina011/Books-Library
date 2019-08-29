
<div class="col-6 offset-3 bg-white my-5 p-5 rounded">

    <h3>Edycja autora</h3>

    <hr/>

    <form class="form-group" action="<?php echo URL; ?>Authors/editAuthor/<?php echo $this->getAuthorById['id'] ?>" method="post">

<!--        --><?php
//        if(isset($_SESSION['infoEditBook']))
//        {
//            echo '<div class="text-danger">' .$_SESSION['infoEditBook'].'</div>';
//            unset($_SESSION['infoEditBook']);
//        }
//        ?><!--<br>-->

<label for="author" class="mr-sm-2">Autor:</label>
<input type="text" class="form-control mb-2 mr-sm-2" id="author" name="author" value="<?php echo $this->getAuthorById['autor'] ?>">

<label for="description">Opis: </label>
<textarea class="form-control mr-sm-2" rows="5" id="description" name="description"><?php echo $this->getAuthorById['opis'] ?></textarea><br>

<button type="submit" class="btn btn-danger mb-2">Zapisz zmiany</button>
</form>
</div>