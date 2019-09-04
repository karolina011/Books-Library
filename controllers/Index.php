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

        foreach ($result as $key => &$book)
        {
            $comments = $this->model->fetchComments($book['id']);
            $book['comments'] = $comments;
//            echo '<pre>';
//            print_r($book['comments'][0]['comment']);
//            die;
        }


        $this->view->books = $result;
        $this->view->authors = $result1;
        $this->view->render('index/index');
    }

}