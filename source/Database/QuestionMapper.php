<?php

namespace Backend\Database;

class QuestionMapper
{
    /** @var QuestionRepository */
    private $questionRepository;

    /**
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository  $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    /**
     * @param int $id
     * @return array
     */
    public function findBySurveyId(int $id ): array
    {
        return $this->questionRepository->findBySurveyId($id);
    }
}