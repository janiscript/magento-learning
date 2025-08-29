<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for question search results
 */
interface QuestionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get questions list
     *
     * @return QuestionInterface[]
     */
    public function getItems();

    /**
     * Set questions list
     *
     * @param QuestionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
