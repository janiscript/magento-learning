<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Model;

use Magento\Framework\Exception\LocalizedException;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\QuestionManagementInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;

/**
 * Question management implementation
 */
class QuestionManagement implements QuestionManagementInterface
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Enable question
     *
     * @param int $questionId
     * @return bool
     * @throws LocalizedException
     */
    public function enableQuestion($questionId)
    {
        try {
            $question = $this->questionRepository->get($questionId);
            $question->setStatus(QuestionInterface::STATUS_ENABLED);
            $this->questionRepository->save($question);
            return true;
        } catch (\Exception $e) {
            throw new LocalizedException(__('Unable to enable question: %1', $e->getMessage()));
        }
    }

    /**
     * Disable question
     *
     * @param int $questionId
     * @return bool
     * @throws LocalizedException
     */
    public function disableQuestion($questionId)
    {
        try {
            $question = $this->questionRepository->get($questionId);
            $question->setStatus(QuestionInterface::STATUS_DISABLED);
            $this->questionRepository->save($question);
            return true;
        } catch (\Exception $e) {
            throw new LocalizedException(__('Unable to disable question: %1', $e->getMessage()));
        }
    }
}
