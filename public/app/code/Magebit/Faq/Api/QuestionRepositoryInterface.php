<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultsInterface;

/**
 * Question repository interface
 */
interface QuestionRepositoryInterface
{
    /**
     * Save question
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws LocalizedException
     */
    public function save(QuestionInterface $question);

    /**
     * Get question by ID
     *
     * @param int $questionId
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get($questionId);

    /**
     * Get questions matching the specified criteria
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return QuestionSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete question
     *
     * @param QuestionInterface $question
     * @return bool
     * @throws LocalizedException
     */
    public function delete(QuestionInterface $question);

    /**
     * Delete question by ID
     *
     * @param int $questionId
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($questionId);
}
