<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\Customer;
use Backend\Database\CustomerRepository;
use PDO;

class MailHandlingController {


    public function handle() {

        $recievedData = json_decode(file_get_contents('php://input'));
        $data['vorname'] = 'Johannes';
        $data['nachname'] = 'Panzer';
        $data['description'] = 'Lorem ipsun';
        $data['email'] = '123@tag24.de';

        $customer = new Customer();
        $customer->setVorname($recievedData->firstName);
        $customer->setNachname($recievedData->lastName);
        $customer->setEmail($recievedData->email);
        $customer->setDescription($recievedData->message);


        $connection = new Connection();
        $pdo = $connection->getPdo();
        $customerRepository = new CustomerRepository($pdo);
        $customerRepository->insert($customer);

        echo json_encode([
            'success' => true,
            'data_from_server' => $data
        ]);


    }
}


