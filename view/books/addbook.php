
<div class="col-6 offset-3 bg-white my-5 p-5 rounded">

    <h3>Zaproponuj książkę</h3>

    <form class="form-group" action="<?php echo URL; ?>Books/addBook" method="post">

        <?php
        if(isset($_SESSION['errBook']))
        {
            echo '<div class="text-danger">' .$_SESSION['errBook'].'</div>';
            unset($_SESSION['errBook']);
        }
        ?><br>

        <label for="author" class="mr-sm-2">Autor:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="author" name="author" value="<?php echo ($_SESSION['addBookData']['author']) ?? ""?>">
        <label for="title" class="mr-sm-2">Tytuł:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="title" name="title" value="<?php echo ($_SESSION['addBookData']['title']) ?? ""?>">
        <label for="year" class="mr-sm-2">Rok wydania:</label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="year" name="year" value="<?php echo ($_SESSION['addBookData']['year']) ?? ""?>">

        <label for="type" >Gatunek: </label>
        <select class="form-control" id="type" name="type">
            <option>Biografia</option>
            <option>Dramat</option>
            <option>Fantasy</option>
            <option>Horror</option>
            <option>Komedia</option>
            <option>Przygodowa</option>
            <option>Romans</option>
            <option>Thriller</option>
        </select><br>

        <label for="description">Opis: </label>
        <textarea class="form-control mr-sm-2" rows="5" id="description" name="description"><?php echo ($_SESSION['addBookData']['description']) ?? ""?></textarea><br>

        <button type="submit" class="btn btn-danger mb-2">Dodaj książkę</button>
    </form>
</div>