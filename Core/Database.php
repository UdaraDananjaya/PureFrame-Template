<?php

/**
 * Database Trait
 *
 * A trait that provides database connectivity and query execution functionality.
 */
trait Database
{
    /**
     * Establish a database connection.
     *
     * @return PDO The database connection.
     * @throws PDOException If a connection error occurs.
     */
    private function connect()
    {
        $dsn = CONFIG['db']['dbdriver'] . ":host=" . CONFIG['db']['hostname'] . ";dbname=" . CONFIG['db']['database'];
        try {
            // Create a new PDO connection
            $con = new PDO($dsn, CONFIG['db']['username'], CONFIG['db']['password']);
            // Set PDO attributes for error handling
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            // If there's an error, handle it and throw the exception again
            echo "Connection failed: " . $e->getMessage();
            throw $e;
        }
    }
    

    /**
     * Execute a database query.
     *
     * @param string $query The query to execute.
     * @param array $data Optional data to bind to the query.
     * @return mixed The query result or false on failure.
     */
    public function query($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $check = $stm->execute($data);
            if ($check) {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                if (is_array($result) && count($result)) {
                    return $result;
                }
            }
        } catch (PDOException $e) {
            // Handle the query execution error
            echo "Query execution failed: " . $e->getMessage();
        }

        return false;
    }

    /**
     * Get the last inserted ID.
     *
     * @param string $query The query to execute.
     * @return int The last inserted ID.
     * @throws PDOException If an error occurs while executing the query.
     */
    public function getLastId($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $check = $stm->execute($data);
            if ($check) {
                return intval($con->lastInsertId());
            }
        } catch (PDOException $e) {
            // Handle the query execution error
            echo "Query execution failed: " . $e->getMessage();
            throw $e;
        }

        return false;
    }

    /**
     * Get a single row from the database.
     *
     * @param string $query The query to execute.
     * @param array $data Optional data to bind to the query.
     * @return mixed The query result or false on failure.
     */
    public function getRow($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $check = $stm->execute($data);
            if ($check) {
                $result = $stm->fetch(PDO::FETCH_OBJ);
                if ($result) {
                    return $result;
                }
            }
        } catch (PDOException $e) {
            // Handle the query execution error
            echo "Query execution failed: " . $e->getMessage();
        }

        return false;
    }
}