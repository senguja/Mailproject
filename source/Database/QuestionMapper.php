<?php

namespace Backend\Database;

class QuestionMapper
{
    /** @var QuestionRepository */
    private $questionRepository;

    /**
     * Übergabeparameter ist das Object QuestionRepository
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository  $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Hier wird auf die Methode findBySurveyId (von QuestionRepository) zugegriffen
     * @param int $id
     * @return array
     */
    public function findBySurveyId(int $id ): array
    {
        return $this->questionRepository->findBySurveyId($id);
    }
}