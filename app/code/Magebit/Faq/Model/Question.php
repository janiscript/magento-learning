<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Question model
 */
class Question extends AbstractModel implements QuestionInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'magebit_faq_question';

    /**
     * Cache tag
     *
     * @var string
     */
    protected $_cacheTag = 'magebit_faq_question';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'magebit_faq_question';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(\Magebit\Faq\Model\ResourceModel\Question::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->getData(self::QUESTION_ID);
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion(): ?string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Set question
     *
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer(): ?string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     *
     * @param int $status
     * @return QuestionInterface
     */
    public function setStatus(int $status): QuestionInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition(): ?int
    {
        return $this->getData(self::POSITION);
    }

    /**
     * Set position
     *
     * @param int $position
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }
}
