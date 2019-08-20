<?php


class Authors_Model extends Model
{
    public function authorList()
    {
        $query = $this->db->query('SELECT * FROM autorzy ORDER BY autor ASC ');

        $authors = $query->fetchAll(PDO::FETCH_ASSOC);

        return $authors ?? false;
    }

    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM autorzy WHERE id = :id');
        $query->execute(array(
            ':id' => $id
        ));
    }

    public function isUserRate($authorID, $userId)
    {
        $query = $this->db->prepare('SELECT id FROM authorsgrade WHERE authorID =:authorID AND userID = :userID');
        $query->execute(array(
            ':authorID' => $authorID,
            ':userID' => $userId //Session::get('user')['id']
        ));

        $sth = $query->fetch();
        return $sth ?? false;
    }

    public function addGrade($authorID, $userId, $grade)
    {
        try{
            $query = $this->db->prepare('INSERT INTO authorsgrade VALUES (null, :authorID, :userID, :grade)');
            $query->execute(array(
                ':authorID' => $authorID,
                ':userID' => $userId,
                ':grade' => $grade
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }

    }

    public function findGrade($id)
    {
        $query = $this->db->prepare('SELECT ROUND(AVG(grade), 1) as grade, COUNT(id) as count FROM authorsgrade WHERE authorID = :authorID');
        $query->execute(array(
            ':authorID' => $id
        ));

        $grade = $query->fetch(PDO::FETCH_ASSOC);

        return $grade ?? false;
    }
}