<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Model\Question;

use Magento\Framework\Api\Search\SearchResult;
use Magebit\Faq\Api\Data\QuestionSearchResultsInterface;

/**
 * Service Data Object with Question search results
 */
class SearchResults extends SearchResult implements QuestionSearchResultsInterface
{
}
