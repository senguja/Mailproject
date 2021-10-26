<?php

namespace Backend\Database;

use PDO;

class QuestionRepository
{

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function findBySurveyId(int $id): array
    {

        $sql = 'SELECT * FROM question WHERE survey_id = :survey_id';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'survey_id' => $id
        ]);
        $record = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($record === false) {
            return [];
        }
        //durchläuft Array, durchläuft die selbstdefinierte function packt das array wieder zusammen
        return array_map(
            static function(array $record) :Question
            {
               return Question::constructFromRecord($record);
            },$record
        );
    }

}