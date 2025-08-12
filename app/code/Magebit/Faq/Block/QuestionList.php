<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

declare(strict_types=1);

namespace Magebit\Faq\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Question list block
 */
class QuestionList extends Template
{
    /**
     * @param Context $context
     * @param QuestionRepositoryInterface $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        private readonly QuestionRepositoryInterface $questionRepository,
        private readonly SearchCriteriaBuilder $searchCriteriaBuilder,
        private readonly SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get enabled questions ordered by position
     *
     * @return QuestionInterface[]
     */
    public function getQuestions(): array
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('position')
            ->setDirection('ASC')
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('status', QuestionInterface::STATUS_ENABLED)
            ->addSortOrder($sortOrder)
            ->create();

        $questions = $this->questionRepository->getList($searchCriteria);
        
        return $questions->getItems();
    }

    /**
     * Get unique accordion ID for question
     *
     * @param QuestionInterface $question
     * @return string
     */
    public function getAccordionId(QuestionInterface $question): string
    {
        return 'faq-question-' . $question->getId();
    }


}
