<?php


class User_Model extends Model
{

    public function isBookExist($bookID, $userID)
    {

        $query = $this->db->prepare('SELECT * FROM usersbook WHERE userID = :userID AND bookID = :bookID');
        $query->execute(array(
            ':userID' => $userID,
            ':bookID' => $bookID,
        ));
        $sth = $query->fetch(PDO::FETCH_ASSOC);

        return $sth ?? false;

    }

    public function addBook($bookID, $isRead, $userID)
    {

        try
        {
            $query = $this->db->prepare('INSERT INTO usersbook VALUES (null, :userID, :bookID, :isRead)');
            $query->execute(array(
               ':userID' => $userID,
               ':bookID' => $bookID,
               ':isRead' => $isRead
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }

    public function getUserBooks($userID)
    {
        $query = $this->db->prepare('SELECT * FROM usersbook as u INNER JOIN ksiazki as k ON u.bookID = k.id WHERE userID = :userID  ');
        $query->execute(array(
            ':userID' => $userID
        ));
        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;
    }

    public function deleteBook($bookID, $userID)
    {
        try {
            $query = $this->db->prepare('DELETE FROM usersbook WHERE userID = :userID AND bookID = :bookID');
            $query->execute(array(
                ':userID' => $userID,
                ':bookID' => $bookID
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }

    public function updateReadBook($bookID, $userID)
    {

        try {
            $query = $this->db->prepare('UPDATE usersbook SET isRead = 1 WHERE userID = :userID AND bookID = :bookID');
            $query->execute(array(
                ':userID' => $userID,
                ':bookID' => $bookID
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }

    public function addComment($comment, $bookID, $userID)
    {
        try {
            $query = $this->db->prepare('INSERT INTO comments (parentCommentsID, comment, bookID, userID) VALUES (:parentCommentsID, :comment, :bookID, :userID)');
            $query->execute(array(
                ':parentCommentsID' => 0,
                ':comment' => $comment,
                ':bookID' => $bookID,
                ':userID' => $userID
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }
}