<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Model\Question\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Status source model
 */
class Status implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => QuestionInterface::STATUS_ENABLED, 'label' => __('Enabled')],
            ['value' => QuestionInterface::STATUS_DISABLED, 'label' => __('Disabled')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            QuestionInterface::STATUS_ENABLED => __('Enabled'),
            QuestionInterface::STATUS_DISABLED => __('Disabled')
        ];
    }
}
