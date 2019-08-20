<?php

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->model->books();
        $result1 = $this->model->authors();


        foreach ($result1 as $key => &$author)
        {
            $grade = $this->model->authorFindGrade($author['id']);
            $author['ocena'] = $grade['grade'];
        }

        foreach ($result as $key => &$book)
        {
            $grade = $this->model->bookFindGrade($book['id']);
            $book['ocena'] = $grade['grade'];
        }
//
        $this->view->books = $result;
        $this->view->authors = $result1;
        $this->view->render('index/index');
    }

}