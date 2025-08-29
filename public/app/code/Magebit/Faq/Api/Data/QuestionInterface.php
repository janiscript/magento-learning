<?php
/**
 * @category Magebit
 * @package Magebit_Faq
 * @author Magebit Team
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 */

namespace Magebit\Faq\Api\Data;

/**
 * Question interface
 */
interface QuestionInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const QUESTION_ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Status constants
     */
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Set question
     *
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion($question);

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer($answer);

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param int $status
     * @return QuestionInterface
     */
    public function setStatus($status);

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition();

    /**
     * Set position
     *
     * @param int $position
     * @return QuestionInterface
     */
    public function setPosition($position);

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt();
}
