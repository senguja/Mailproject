<?php declare(strict_types=1);

namespace Backend\Database;

use PDO;
use PDOException;

class  CustomerRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @param $data
     */
    function insert($data):void
    {
        try {
            $vorname= $data['vorname'];
            $nachname= $data['nachname'];
            $description= $data['description'];
            $email= $data['email'];

            $sql= 'INSERT INTO customer (vorname,nachname,description,email) VALUES (:vorname,:nachname,:description,:email)';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'vorname' => $vorname,
                'nachname' => $nachname,
                'description' => $description,
                'email' => $email
            ]);
        } catch (PDOException $e) {
            throw new PDOException('could not insert data into database');
        }
    }
}