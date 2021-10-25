<?php declare(strict_types=1);


namespace Backend\Database;

class SurveyMapper
{
    /** @var UserAnswerRepository */
    private $userAnswerRepository;

    /**
     * @param UserAnswerRepository $userAnswerRepository
     */
    public function __construct(UserAnswerRepository $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }


    /**
     * @param UserAnswer $userAnswer
     */
    public function insertAnswer(UserAnswer $userAnswer) :void
    {
        $this->userAnswerRepository->insert($userAnswer);
    }
}