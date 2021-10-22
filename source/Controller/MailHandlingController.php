<?php

namespace Backend\Controller;

use Backend\Database\CustomerRepository;
use PDO;

class MailHandlingController {


    public function handle() {
        //Connection to Database >>data<<
        $pdo = new PDO("mysql:dbname=mail_project;host=localhost",
            "root",
            "root");

        // empfangen Requestbody im jsonformat
        $recievedData = file_get_contents('php://input');

// decodieren des requestbody
        $data = json_decode($recievedData);
        if ($data !== null) {
            $customerRepository = new CustomerRepository($pdo);
            $customerRepository->insert($data);

            echo json_encode([
                'success' => true,
                'data_from_server' => $data
            ]);

        }
    }
}


