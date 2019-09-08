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
        if ($_POST)
        {
            $bookID = $_POST['data']['bookID'];
            $parentID = $_POST['data']['parentID'];
            $comments = $this->model->fetchComments($bookID, $parentID);

            foreach ($comments as $key =>&$comment)
            {
                $commentFirstReplies = $this->model->fetchComments($bookID, $comment['commentID']);
                $comment['firstReplies'] = $commentFirstReplies;

                foreach ($comment['firstReplies'] as $key =>&$com)
                {
                    $commentSecondReplies = $this->model->fetchComments($bookID, $com['commentID']);
                    $com['secondReplies'] = $commentSecondReplies;
                }

            }

//            echo '<pre>';
//            print_r($comments);
//            die;

//            $this->view->commentFirstReplies = $commentFirstReplies;
            $this->view->comments = $comments;
            $this->view->render('index/comments', true);
            die;


//            $comments= mb_convert_encoding($comments, 'UTF-8', 'UTF-8');
//            echo '<pre>';
//            print_r($comments);
//            die;

//            echo json_encode($comments);
//            die;

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

        $result = $this->model->books();
        $result1 = $this->model->authors();
        $this->view->books = $result;
        $this->view->authors = $result1;
        $this->view->render('index/index');
    }




}