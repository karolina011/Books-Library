<?php


class Authors_Model extends Model
{
    public function authorList()
    {
        $query = $this->db->query('SELECT a.*, ROUND(AVG(g.grade), 1) as ocena, COUNT(g.id) as count FROM autorzy as a LEFT JOIN authorsgrade as g ON a.id = g.authorID GROUP BY g.authorID ORDER BY autor ASC ');

        $authors = $query->fetchAll(PDO::FETCH_ASSOC);

        return $authors ?? false;
    }

    public function delete($id)
    {
        try{
            $query = $this->db->prepare('DELETE FROM autorzy WHERE id = :id');
            $query->execute(array(
                ':id' => $id
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }

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


    public function getAuthorById($id)
    {
        $query = $this->db->prepare('SELECT * FROM autorzy WHERE id = :id');
        $query->execute(array(
            ':id' => $id
        ));

        $sth = $query->fetch(PDO::FETCH_ASSOC);

        return $sth ?? false;
    }

    public function editAuthor($id, $data)
    {

        try{
            $query = $this->db->prepare('UPDATE autorzy SET autor = :author, opis = :description WHERE id = :id');
            $query->execute(array(
                ':author' => $data['author'],
                ':description' => $data['description'],
                ':id' => $id
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }

    }
}