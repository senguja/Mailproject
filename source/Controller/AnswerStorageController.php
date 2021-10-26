<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\UserAnswer;
use Backend\Database\UserAnswerMapper;
use Backend\Database\UserAnswerRepository;

class AnswerStorageController
{
    public function saveAnswers()
    {
        $recievedData = json_decode(file_get_contents('php://input'), true);
        if ($recievedData){
            $connection = new Connection();
            $pdo = $connection->getPdo();
            $userAnswerMapper = new UserAnswerMapper(new UserAnswerRepository($pdo));
            foreach ($recievedData as $answer){
                $userAnswer= new UserAnswer();
                $userAnswer->setAnswer($answer);
                $userAnswer->setUserId(1);
                $userAnswer->setQuestionId(1);
                $userAnswerMapper->insertAnswer($userAnswer);

                echo json_encode([
                    'success' => true
                ]);
            }
        }

    }
}