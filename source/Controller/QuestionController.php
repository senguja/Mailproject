<?php

namespace Backend\Controller;

use Backend\Connection;
use Backend\Database\Question;
use Backend\Database\QuestionMapper;
use Backend\Database\QuestionRepository;

class QuestionController
{


    public function fetch()
    {
        $path = $_SERVER['REQUEST_URI'];
        $id = substr($path, strrpos($path, '/') + 1);
        $connection= new Connection();
        $pdo = $connection->getPdo();
        $questionMapper = new QuestionMapper(new QuestionRepository($pdo));
        $questions = $questionMapper->findBySurveyId((int)$id);
        echo json_encode([
            'success' => true,
            'questions' => array_map(
                static function (Question $question){
                    return [
                        'id' => $question->getId(),
                        'question' => $question->getQuestion()
                    ];
                },$questions
            )
        ]);
    }
}