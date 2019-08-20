<?php


class Authors extends Controller
{
    public function index()
    {
        $result = $this->model->authorList();



        foreach ($result as $key => &$author)
        {
            $grade = $this->model->findGrade($author['id']);
            $author['ocena'] = $grade['grade'];
        }


        $this->view->authorList = $result;

        $this->view->render('authors/authors');

    }

    public function authorDelete($id)
    {
        if(!Session::get('user')) {
            return;
        }
        $this->model->delete($id);
        header("Location: " . URL . "Authors");
    }

    public function authorGradeAdd($id)
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
}