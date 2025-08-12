<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */
declare(strict_types=1);

namespace Magebit\Faq\Model\Question;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * DataProvider for question form
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var \Magebit\Faq\Model\ResourceModel\Question\Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $questionCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $questionCollectionFactory,
        private readonly DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $questionCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        
        $items = $this->collection->getItems();
        /** @var \Magebit\Faq\Model\Question $question */
        foreach ($items as $question) {
            $this->loadedData[$question->getId()] = $question->getData();
        }
        
        $data = $this->dataPersistor->get('magebit_faq_question');
        if (!empty($data)) {
            $question = $this->collection->getNewEmptyItem();
            $question->setData($data);
            $this->loadedData[$question->getId()] = $question->getData();
            $this->dataPersistor->clear('magebit_faq_question');
        }
        
        return $this->loadedData;
    }
}
