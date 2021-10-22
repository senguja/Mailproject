<?php

namespace Backend;

use PDO;

class Connection
{
    private $pdo;
    /** @var string  */
    private $dbName = 'mail_project';
    /** @var string  */
    private $host = 'localhost';
    /** @var string  */
    private $username = 'root';
    /** @var string  */
    private $password = 'root';

    public function __construct()
    {
        //Connection to Database >>data<<
        $this->pdo = new PDO("mysql:dbname=".$this->dbName.";host=".$this->host."",
            "".$this->username."",
            "".$this->password."");
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }


}