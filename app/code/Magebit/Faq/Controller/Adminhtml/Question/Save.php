<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Api\Data\QuestionInterfaceFactory;

/**
 * Save question controller
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magebit_Faq::question';

    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var QuestionInterfaceFactory
     */
    protected $questionFactory;

    /**
     * @param Context $context
     * @param QuestionRepositoryInterface $questionRepository
     * @param QuestionInterfaceFactory $questionFactory
     */
    public function __construct(
        Context $context,
        QuestionRepositoryInterface $questionRepository,
        QuestionInterfaceFactory $questionFactory
    ) {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
        $this->questionFactory = $questionFactory;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        $data = $this->getRequest()->getPostValue();
        
        if ($data) {
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model = $this->questionRepository->get($id);
                } else {
                    $model = $this->questionFactory->create();
                }

                $model->setQuestion($data['question'] ?? '');
                $model->setAnswer($data['answer'] ?? '');
                $model->setStatus($data['status'] ?? 0);
                $model->setPosition($data['position'] ?? 0);

                $this->questionRepository->save($model);
                
                $this->messageManager->addSuccessMessage(__('You saved the question.'));
                
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the question.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        
        return $resultRedirect->setPath('*/*/');
    }
}
