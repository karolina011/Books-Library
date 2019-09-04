<?php


class User extends Controller
{
    /**
     * @var User_Model
     */
    protected $model;

    public function books($bookID)
    {
        $read = $_POST['data'];
        $zakladka = $read==1 ? '"przeczytane"' : '"chcę przeczytać"';

        $result = $this->model->isBookExist($bookID, Session::get('user')['id']);
        if ($result)
        {
            echo "Ta pozycja istnieje już w Twoich książkach";
            die;
        }

        $result = $this->model->addBook($bookID, $read, Session::get('user')['id']);
        if ($result)
        {
            echo "Dodano książkę do Twojej zakładki ". $zakladka;
            die;
        }
    }

    public function showUserBooks()
    {
        $result = $this->model->getUserBooks(Session::get('user')['id']);
        $this->view->getUserBooks = $result;

        $this->view->render('users/myBooks');
    }

    public function deleteBook($bookID)
    {
        $result = $this->model->deleteBook($bookID, Session::get('user')['id']);
        if ($result)
        {
            echo "usunieto";
        }
    }

    public function updateReadBook($bookID)
    {
        $result = $this->model->updateReadBook($bookID, Session::get('user')['id']);
        if ($result)
        {
            echo "zmodyfikowano";
        }
    }

    public function addComment($bookId)
    {
//        echo '<pre>';
//        print_r($_POST);
//        die;
        $error = '';
        $commentContent = '';

        if (empty($_POST['data'][0]['value']))
        {
            $error = " Nie możesz dodać pustego komentarza. ";
        }
        else
        {
            $commentContent = $_POST['data'][0]['value'];
        }

        if ($error == '')
        {
            $result = $this->model->addComment($commentContent, $bookId, Session::get('user')['id']);
            if ($result)
            {
                $error = "Komentarz został dodany.";
            }
        }

        $data = array(
            'error' => $error
        );

        echo json_encode($data);

    }

}