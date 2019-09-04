<?php


class Books extends Controller
{
    /**
     * @var Books_Model
     */
    protected $model;

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
        $data['sort'] = $_POST['sort'];

        $result = $this->model->filterBooks($data);

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

        if (!(Session::get('loggedIn')))
        {
            $_SESSION['infoAddBook'] = "Aby wysłać propozycję książki musisz się zalogować";
            die;
        }

        $result = $this->model->isBookExistInDatabase($data);
        if (is_string($result))
        {
            $_SESSION['infoAddBook'] = "Podana książka istnieje już w bazie danych!";
            $blad = true;
        }

        foreach ($data as $var)
        {
            if (empty($var))
            {
                $blad = true;
                $_SESSION['infoAddBook'] = "Wszystkie pola muszą zostać wypełnione!";
            }
        }


        if ($blad)
        {
            $_SESSION['addBookData'] = $data;
            header("Location: " . URL . "books/addBookView");
            exit();
        }
        else
        {
            $result = $this->model->sendBook($data, Session::get('user')['id']);
            if ($result)
            {
                $_SESSION['infoAddBook'] = "Propozycja książki została wysłana do administratora i czeka na akceptację.";
                header("Location: " . URL . "books/addBookView");
                exit();
            }
            $_SESSION['infoAddBook'] = "Coś poszło nie tak, spróbuj jeszcze raz";
            header("Location: " . URL . "books/addBookView");
        }

    }

    public function bookGradeAdd($id)
    {
        $grade = $_POST['data'];

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

    public function acceptBookView()
    {
        $result = $this->model->getBooks();

        $this->view->getBooks = $result;

        $this->view->render('books/accept');
    }

    public function acceptBook($bookID)
    {
        $this->model-> acceptBook($bookID);
        header("Location: " . URL . "Books/acceptBookView");
        exit();
    }

    public function deleteBook($bookID)
    {
        $result = $this->model-> deleteBook($bookID);
        if ($result)
        {
            echo "usunieto";
            die;
        }
    }

    public function editBookView($bookID)
    {
        if ($_POST)
        {
            $data = array();
            $data['author'] = $_POST['author'];
            $data['title'] = $_POST['title'];
            $data['year'] = $_POST['year'];
            $data['type'] = $_POST['type'];
            $data['description'] = $_POST['description'];

            $result = $this->model->editBook($bookID, $data);
            if ($result)
            {
//                Session::set('editBookInfo', 'Zmiany zostały zapisane.');
                header("Location: " . URL . "Books/filterBooksView");
                die;
            }
        }

        $result = $this->model-> getBookById($bookID);
        $this->view->getBookById = $result;

        $this->view->render('books/edit');

    }


}