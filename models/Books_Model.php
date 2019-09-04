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
        $prepare = 'SELECT  k.*, ROUND(AVG(b.grade), 1) as ocena, COUNT(b.id) as count FROM ksiazki as k LEFT JOIN booksgrade as b ON k.id = b.bookID ';

        $filters = [];
        $fGrade = [];
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

        if (($data['noteMin'] >=1) && ($data['noteMin'] <=10))
        {
            $fGrade[] = "ROUND(AVG(b.grade),1)>= :noteMin ";

            $binds[':noteMin'] = (int)$data['noteMin'];

        }

        if (($data['noteMax'] >=1) && ($data['noteMax'] <=10))
        {
            $fGrade[] = "ROUND(AVG(b.grade),1)<= :noteMax";
            $binds[':noteMax'] = (int)$data['noteMax'];
        }

        if ($data['sort'] == 'Oceny (od najwyższej)')
        {
            $sort = " ROUND(AVG(b.grade), 1) DESC";
        }
        elseif ($data['sort'] == 'Oceny (od najniższej)')
        {
            $sort = " ROUND(AVG(b.grade), 1) ASC";
        }
        elseif ($data['sort'] == 'Alfabetu')
        {
            $sort = " tytul ASC";
        }
        elseif ($data['sort'] == 'Daty wydania (od najstarszej)')
        {
            $sort = " datawydania ASC";
        }
        elseif ($data['sort'] == 'Daty wydania (od najnowszej)')
        {
            $sort = " datawydania DESC";
        }


        if ((!empty($filters)) && (!empty($fGrade))) {

            $filtersAsString = " " . implode(" AND ", $filters);
            $filtersGrade = " HAVING " . implode(' AND ', $fGrade) ;

            $prepare .= ' WHERE  k.accept=1 AND ' . $filtersAsString . ' GROUP BY b.bookID '. $filtersGrade . ' ORDER BY ' . $sort ;
        }
        else if ((!empty($fGrade)) && (empty($filters)) )
        {
            $filtersGrade = " HAVING " . implode(' AND ', $fGrade) ;

            $prepare .= ' WHERE k.accept=1 GROUP BY b.bookID ' . $filtersGrade . ' ORDER BY ' . $sort  ;
        }
        else if ((!empty($filters)) && (empty($fGrade))) {

            $filtersAsString = " " . implode(" AND ", $filters);

            $prepare .= ' WHERE  k.accept=1 AND ' . $filtersAsString . ' GROUP BY b.bookID  ORDER BY ' . $sort  ;
        }
        else
        {
            $prepare .= ' WHERE k.accept=1 GROUP BY b.bookID ORDER BY ' . $sort  ;
        }

//        print_r($prepare);
//        die;

        $query = $this->db->prepare($prepare);

        $result1 = $query->execute($binds);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
//


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
        catch (Exception $exception)
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

    public function sendBook($data, $userID)
    {
        try{
        $query = $this->db->prepare('INSERT INTO ksiazki VALUES (null, :title, :autor, :year, :type, :description, :image, :accept) ');
        $query->execute(array(
            ':title' => $data['title'],
            ':autor' => $data['author'],
            ':year' => $data['year'],
            ':type' => $data['type'],
            ':description' => $data['description'],
            ':image' => "",
            ':accept' => 0
        ));
        return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }

    public function getBooks()
    {
        $query = $this->db->query('SELECT * FROM ksiazki WHERE accept = 0');

        $sth = $query->fetchAll(PDO::FETCH_ASSOC);

        return $sth ?? false;
    }

    public function acceptBook($id)
    {
        $query = $this->db->prepare('UPDATE ksiazki SET accept = 1 WHERE id = :id');
        $query->execute(array(
           ':id' => $id
        ));
    }

    public function deleteBook($id)
    {
        try {
            $query = $this->db->prepare('DELETE FROM ksiazki WHERE id = :id');
            $query->execute(array(
                ':id' => $id
            ));
            return true;
        }
        catch (Exception $exception) {
            return false;
        }
    }

    public function getBookById($id)
    {
        $query = $this->db->prepare('SELECT * FROM ksiazki WHERE id = :id');
        $query->execute(array(
            ':id' => $id
        ));

        $sth = $query->fetch(PDO::FETCH_ASSOC);

        return $sth ?? false;
    }

    public function editBook($id, $data)
    {

        try{
            $query = $this->db->prepare('UPDATE ksiazki SET tytul = :title, autor = :author, datawydania = :year, gatunek = :type, opis = :description WHERE id = :id');
            $query->execute(array(
                ':title' => $data['title'],
                ':author' => $data['author'],
                ':year' => $data['year'],
                ':type' => $data['type'],
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