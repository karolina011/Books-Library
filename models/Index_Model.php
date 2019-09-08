<?php

class Index_Model extends Model
{
    public function books()
    {
        $query = $this->db->query(' SELECT  k.*, ROUND(AVG(b.grade), 1) as ocena, COUNT(b.grade) as count FROM ksiazki as k LEFT JOIN booksgrade as b  ON k.id = b.bookID AND k.accept=1 GROUP BY b.bookID ORDER BY ROUND(AVG(b.grade), 1) DESC LIMIT 5');

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);


        return $sth ?? false;

    }

    public function authors()
    {
        $query = $this->db->query('SELECT a.*, ROUND(AVG(g.grade), 1) as ocena, COUNT(g.grade) as count FROM autorzy as a LEFT JOIN authorsgrade as g ON a.id = g.authorID GROUP BY authorID ORDER BY ROUND(AVG(g.grade), 1) DESC LIMIT 5 ');

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;

    }

    public function fetchComments($bookID, $parentID)
    {
        $query = $this->db->prepare('SELECT * FROM comments as c INNER JOIN users as u  ON c.userID = u.id  WHERE c.bookID = :bookID AND parentCommentsID = :parentID ORDER BY  c.commentID ASC');
        $query->execute(array(
            ':bookID' => $bookID,
            ':parentID' => $parentID
        ));

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;
    }

//    public function fetchComments($bookID)
//    {
//        $query = $this->db->prepare('SELECT * FROM comments as c INNER JOIN users as u INNER JOIN ksiazki as k ON c.userID = u.id AND c.bookID = k.id WHERE c.bookID = :bookID  ORDER BY c.id DESC');
//        $query->execute(array(
//            ':bookID' => $bookID
//        ));
//
//        $sth = $query->fetchAll(PDO::FETCH_ASSOC);
//
//        return $sth ?? false;
//    }

}