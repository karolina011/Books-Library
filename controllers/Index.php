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


        $this->view->books = $result;
        $this->view->authors = $result1;
        $this->view->render('index/index');
    }

}