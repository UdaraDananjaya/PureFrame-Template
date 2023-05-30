<?php

/**
 * Database Trait
 */
trait Database
{
    private function connect()
    {
        $string = CONFIG['db']['dbdriver'] . ":host=" . CONFIG['db']['hostname'] . ";dbname=" . CONFIG['db']['database'];
        $con = new PDO($string, CONFIG['db']['username'], CONFIG['db']['password']);
        return $con;
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (!empty($result)) {
                return $result;
            }
        }
        return false;
    }

    public function getLastId($query)
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $stm->execute();
        return $con->lastInsertId();
    }

    public function getRow($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetch(PDO::FETCH_OBJ);
            if (!empty($result)) {
                return $result;
            }
        }
        return false;
    }
}
