<?php

namespace Backend\Database;

use PDO;
use PDOException;

class UserAnswerRepository
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
     * @param UserAnswer $userAnswer
     */
    function insert(UserAnswer $userAnswer):void
    {
        try {
            $sql= 'INSERT INTO user_answer (answer, user_id, question_id) VALUES (:answer,:user_id,:question_id)';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'answer' => $userAnswer->getAnswer(),
                'user_id' => $userAnswer->getUserId(),
                'question_id' => $userAnswer->getQuestionId()
            ]);
        } catch (PDOException $e) {
            throw new PDOException('could not insert answers into database');
        }
    }

}