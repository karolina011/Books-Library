<?php


class Books extends Controller
{

    public function filterBooksView()
    {

        if (!empty($_POST))
        {
            $this->filterBooks();
        }

        $this->view->render('books/filterbooks');

    }

    public function filterBooks()
    {

        $data = [];
        $data['author'] = $_POST['author'];
        $data['title'] = $_POST['title'];
        $data['yearMin'] = $_POST['yearMin'];
        $data['yearMax'] = $_POST['yearMax'];
        $data['type'] = $_POST['type'];
        $data['noteMin'] = $_POST['noteMin'];
        $data['noteMax'] = $_POST['noteMax'];

        $result = $this->model->filterBooks($data);


        foreach ($result as $key => &$book)
        {
            $grade = $this->model->findGrade($book['id']);
            $book['ocena'] = $grade['grade'];
        }
        $this->view-> filterBooks = $result;

    }

    public function addBookView()
    {
        $this->view->render('books/addbook');
    }

    public function addBook()
    {
        if($_SESSION['user'] )
            $data = array();
        $data['author'] = $_POST['author'];
        $data['title'] = $_POST['title'];
        $data['year'] = $_POST['year'];
        $data['type'] = $_POST['type'];
        $data['description'] = $_POST['description'];

        $blad = false;

        $result = $this->model->isBookExistInDatabase($data);
        if (is_string($result))
        {
            $_SESSION['errBook'] = "Podana książka istnieje już w bazie danych!";
            $blad = true;
        }


        if ($blad)
        {
            $_SESSION['addBookData'] = $data;
            header("Location: " . URL . "books/addBookView");
            exit();
        }
        else
        {
            echo "Nie ma błędu";
        }

    }

    public function myBooks()
    {
        $this->view->render('books/mybooks');
    }

    public function bookGradeAdd($id)
    {
        $grade = $_POST['grade'];

        if (!(Session::get('loggedIn')))
        {
            echo "Aby dodać ocenę musisz się zalogować";
            die;
        }

        $result = $this->model-> isUserRate($id, Session::get('user')['id']);
        if ($result)
        {
            echo "Ta książka została już przez Ciebie oceniona.";
            die;
        }

        $result = $this->model->addGrade($id, Session::get('user')['id'], $grade);
        if ($result)
        {
            echo "Dodano ocenę";
            die;
        }
        echo "bład";
    }


}