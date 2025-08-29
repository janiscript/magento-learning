<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Question resource model
 */
class Question extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magebit_faq_question', 'id');
    }
}
