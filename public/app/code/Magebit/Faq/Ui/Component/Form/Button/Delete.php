<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\RequestInterface;

/**
 * Delete button
 */
class Delete implements ButtonProviderInterface
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param UrlInterface $urlBuilder
     * @param RequestInterface $request
     */
    public function __construct(
        UrlInterface $urlBuilder,
        RequestInterface $request
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete Question'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this question?')
                    . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get question ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->request->getParam('id');
    }

    /**
     * Generate url by route and parameters
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->urlBuilder->getUrl('*/*/delete', ['id' => $this->getId()]);
    }
}
