<?php

namespace Backend\Database;

class Question
{
    /** @var int */
    private $id;
    /** @var string */
    private $question;
    /** @var int */
    private $surveyId;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }


    /**
     * @param array <string, string> $record
     * @return self
     */
    public static function constructFromRecord(array $record): self
    {
        $question = new self((int)$record['id']);
        $question->setQuestion((string)$record['question']);
        $question->setSurveyId((int)$record['survey_id']);

        return $question;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return int
     */
    public function getSurveyId(): int
    {
        return $this->surveyId;
    }

    /**
     * @param int $surveyId
     */
    public function setSurveyId(int $surveyId): void
    {
        $this->surveyId = $surveyId;
    }


}