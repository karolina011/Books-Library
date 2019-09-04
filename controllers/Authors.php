<?php


class Authors extends Controller
{

    /**
     * @var Authors_Model
     */
    protected $model;

    public function index()
    {
        $result = $this->model->authorList();

        $this->view->authorList = $result;

        $this->view->render('authors/authors');

    }

    public function authorDelete($id)
    {
        if(!Session::get('user')) {
            return;
        }
        $result = $this->model->delete($id);
        if ($result)
        {
            echo "usunieto";
        }
    }

    public function authorGradeAdd($id)
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
            echo "Ten autor został już przez Ciebie oceniony.";
            die;
        }

        $result = $this->model->addGrade($id, Session::get('user')['id'], $grade);
        if ($result)
        {
            echo "Dodano ocene";
            die;
        }
        echo "bład";
    }

    public function authorGradeShow($id)
    {

        return "lalal";
    }

    public function editAuthor($authorID)
    {
        if ($_POST)
        {
            $data = array();
            $data['author'] = $_POST['author'];
            $data['description'] = $_POST['description'];

            $result = $this->model->editAuthor($authorID, $data);
            if ($result)
            {
//                Session::set('editBookInfo', 'Zmiany zostały zapisane.');
                header("Location: " . URL . "Authors");
                die;
            }
        }

        $result = $this->model-> getAuthorById($authorID);
        $this->view->getAuthorById = $result;

        $this->view->render('authors/edit');

    }

}