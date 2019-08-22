<?php


class Index_Model extends Model
{
    public function books()
    {
        $query = $this->db->query('SELECT  k.* FROM ksiazki as k , booksgrade as b  WHERE k.id = b.bookID GROUP BY b.bookID  LIMIT 5');

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;

    }

    public function authors()
    {
        $query = $this->db->query('SELECT * FROM autorzy LIMIT 5 ');

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;

    }

    public function authorFindGrade($id)
    {
        $query = $this->db->prepare('SELECT ROUND(AVG(grade), 1) as grade, COUNT(id) as count FROM authorsgrade WHERE authorID = :authorID');
        $query->execute(array(
            ':authorID' => $id
        ));

        $grade = $query->fetch(PDO::FETCH_ASSOC);

        return $grade ?? false;
    }

    public function bookFindGrade($id)
    {
        $query = $this->db->prepare('SELECT ROUND(AVG(grade), 1) as grade, COUNT(id) as count FROM booksgrade WHERE bookID = :bookID');
        $query->execute(array(
            ':bookID' => $id
        ));

        $grade = $query->fetch(PDO::FETCH_ASSOC);

        return $grade ?? false;
    }

}