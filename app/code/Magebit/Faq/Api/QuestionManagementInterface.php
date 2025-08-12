<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Api;

use Magento\Framework\Exception\LocalizedException;

/**
 * Question management interface
 */
interface QuestionManagementInterface
{
    /**
     * Enable question
     *
     * @param int $questionId
     * @return bool
     * @throws LocalizedException
     */
    public function enableQuestion(int $questionId): bool;

    /**
     * Disable question
     *
     * @param int $questionId
     * @return bool
     * @throws LocalizedException
     */
    public function disableQuestion(int $questionId): bool;
}
