<div class="col-6 offset-3 bg-white my-5 p-5 rounded">

    <h3>Edycja książki</h3>

    <hr/>

    <form class="form-group" action="<?php echo URL; ?>Books/editBookView/<?php echo $this->getBookById['id'] ?>" method="post">

<!--        --><?php
//        if(isset($_SESSION['infoEditBook']))
//        {
//            echo '<div class="text-danger">' .$_SESSION['infoEditBook'].'</div>';
//            unset($_SESSION['infoEditBook']);
//        }
//        ?><!--<br>-->

        <label for="author" class="mr-sm-2">Autor:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="author" name="author" value="<?php echo $this->getBookById['autor'] ?>">
        <label for="title" class="mr-sm-2">Tytuł:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="title" name="title" value="<?php echo $this->getBookById['tytul'] ?>">
        <label for="year" class="mr-sm-2">Rok wydania:</label>
        <input type="number" class="form-control mb-2 mr-sm-2 col-md-3" id="year" name="year" value="<?php echo $this->getBookById['datawydania'] ?>">

        <label for="type" >Gatunek: </label>
        <select class="form-control col-md-3" id="type" name="type">
            <option <?php if ($this->getBookById['gatunek'] == 'Biografia') echo 'selected';  ?>>Biografia</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Dramat') echo 'selected';  ?>>Dramat</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Fantasy') echo 'selected';  ?>>Fantasy</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Horror') echo 'selected';  ?>>Horror</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Komedia') echo 'selected';  ?>>Komedia</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Przygodowa') echo 'selected';  ?>>Przygodowa</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Romans') echo 'selected';  ?>>Romans</option>
            <option <?php if ($this->getBookById['gatunek'] == 'Thriller') echo 'selected';  ?>>Thriller</option>
        </select><br>

        <label for="description">Opis: </label>
        <textarea class="form-control mr-sm-2" rows="5" id="description" name="description"><?php echo $this->getBookById['opis'] ?></textarea><br>

        <button type="submit" class="btn btn-danger mb-2">Zapisz zmiany</button>
    </form>
</div>