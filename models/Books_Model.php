<?php


class Books_Model extends Model
{
    const ALLOWED_SPECIES = [
        'Biografia',
        'Dramat',
        'Fantasy',
        'Horror',
        'Komedia',
        'Przygodowa',
        'Romans',
        'Thriller'
    ];


    public function filterBooks($data)
    {
        $prepare = 'SELECT DISTINCT * FROM ksiazki , booksgrade  ';

        $filters = [];
        $binds = [];

        if ($data['author']) {
            $filters[] = "autor LIKE :autor";
            $binds[':autor'] = "%{$data['author']}%";
        }

        if ($data['title'])
        {
            $filters[] = "tytul LIKE :title";
            $binds[":title"] = "%{$data['title']}%";
        }

        if ($data['yearMin'])
        {
            $filters[] ="datawydania >= :datawydaniaMin";
            $binds[':datawydaniaMin'] = $data['yearMin'];
        }

        if ($data['yearMax'])
        {
            $filters[] ="datawydania <= :datawydaniaMax";
            $binds[':datawydaniaMax'] = $data['yearMax'];
        }

        if (isset($data['type']) && $data['type']) {

            $filtersAsString = '';
//
            $species = $this->getAllowedSpeciesFromGiven($data['type']);

            $filtersAsString = "'" . implode("','", $species) . "'";

            $filters[] = "gatunek IN ({$filtersAsString})";
//
        }

        if (($data['noteMin']) && ($data['noteMax'])) {
            $filters[] = "grade BETWEEN :noteMin AND :noteMax AND ksiazki.id = booksgrade.bookID ";

            $binds[':noteMin'] = (int)$data['noteMin'];
            $binds[':noteMax'] = (int)$data['noteMax'];
        }


        if (!empty($filters)) {

            $filtersAsString = " " . implode(" AND ", $filters);
            $prepare .= ' WHERE ' . $filtersAsString ;
        }


        $query = $this->db->prepare($prepare);
//        foreach ($binds as $param => $value) {
//
//            $query->bindParam($param, $value);
//        }
//

        $result1 = $query->execute($binds);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
//
//        echo '<pre>';
//        print_r($result);
//        die;

        return $result ?? false;

    }

    public function getAllowedSpeciesFromGiven($species)
    {
        $allowedSpecies = [];
        foreach ($species as $speciy) {
            if (in_array($speciy, self::ALLOWED_SPECIES)) {
                $allowedSpecies[] = $speciy;
            }
        }

        return $allowedSpecies;
    }

    public function isBookExistInDatabase($data)
    {
        $query = $this->db->prepare('SELECT autor FROM ksiazki WHERE tytul = :tytul AND autor = :autor AND datawydania = :datawydania ');
        $query->execute(array(
            ':tytul' => $data['title'],
            ':autor' => $data['author'],
            ':datawydania' => $data['year'],
        ));


        $count = $query->rowCount();

        if ($count > 0)
        {
            return "Taka książka istnieje już w bazie daneych";
        }
        return true;

    }

    public function isUserRate($bookID, $userId)
    {
        $query = $this->db->prepare('SELECT id FROM booksgrade WHERE bookID =:bookID AND userID = :userID');
        $query->execute(array(
            ':bookID' => $bookID,
            ':userID' => $userId //Session::get('user')['id']
        ));

        $sth = $query->fetch();
        return $sth ?? false;
    }

    public function addGrade($bookID, $userId, $grade)
    {
        try{
            $query = $this->db->prepare('INSERT INTO booksgrade VALUES (null, :bookID, :userID, :grade)');
            $query->execute(array(
                ':bookID' => $bookID,
                ':userID' => $userId,
                ':grade' => $grade
            ));
            return true;
        }
        catch (\Exception $exception)
        {
            return false;
        }

    }

    public function findGrade($id)
    {
        $query = $this->db->prepare('SELECT ROUND(AVG(grade), 1) as grade, COUNT(id) as count FROM booksgrade WHERE bookID = :bookID');
        $query->execute(array(
            ':bookID' => $id
        ));

        $grade = $query->fetch(PDO::FETCH_ASSOC);

        return $grade ?? false;
    }

}