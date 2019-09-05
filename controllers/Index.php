<?php

class Index extends Controller
{
    /**
     * @var Index_Model
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $result = $this->model->books();
        $result1 = $this->model->authors();

        if ($_POST)
        {
            $bookID = $_POST['data']['bookID'];
            $parentID = $_POST['data']['parentID'];
            $comments = $this->model->fetchComments($bookID, $parentID);

            $comments= mb_convert_encoding($comments, 'UTF-8', 'UTF-8');


//            echo '<pre>';
//            print_r($comments);
//            die;

            echo json_encode($comments, JSON_FORCE_OBJECT);
            die;

//
        }

//        foreach ($result as $key => &$book)
//        {
//            $comments = $this->model->fetchComments($book['id'], 0);
//            $book['comments'] = $comments;
//                        echo '<pre>';
//                        print_r($book['comments'][0]['comment']);
//                        die;
//        }

        $this->view->books = $result;
        $this->view->authors = $result1;
        $this->view->render('index/index');
    }


}