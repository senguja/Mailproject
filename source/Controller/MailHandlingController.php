<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\Customer;
use Backend\Database\CustomerRepository;
use Backend\Database\SurveyMapper;
use Backend\Database\UserAnswerRepository;
use PDO;

class MailHandlingController
{

    public function handle()
    {

        $recievedData = json_decode(file_get_contents('php://input'));

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
            'data_from_server' => $customer
        ]);

    }

    public function sendMail()
    {
        $recievedData = json_decode(file_get_contents('php://input'));

        var_dump('vor variable');
        $customer = new Customer();
        $customer->setVorname($recievedData->firstName);
        $customer->setNachname($recievedData->lastName);
        $customer->setEmail($recievedData->email);
        $customer->setDescription($recievedData->message);

        $to = 'lukas.albrecht@tag24.de';
        $subject = 'test';
        $message = $customer->getDescription();
        $from = $customer->getEmail();
        $headers = 'From: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        var_dump('vor funktion');

        mail($to, $subject, $message, $headers);

        var_dump('nach funktion');

    }

    public function saveAnswers()
    {
        $connection = new Connection();
        $pdo = $connection->getPdo();
        $surveyMapper = new SurveyMapper(new UserAnswerRepository($pdo));
        $surveyMapper->insertAnswer();
    }
}


