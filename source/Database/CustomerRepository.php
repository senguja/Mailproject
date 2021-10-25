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
     * @param Customer $customer
     */
    function insert(Customer $customer):void
    {
        try {
            $sql= 'INSERT INTO customer (vorname,nachname,description,email) VALUES (:vorname,:nachname,:description,:email)';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'vorname' => $customer->getVorname(),
                'nachname' => $customer->getNachname(),
                'description' => $customer->getDescription(),
                'email' => $customer->getEmail()
            ]);
        } catch (PDOException $e) {
            throw new PDOException('could not insert data into database');
        }
    }
}