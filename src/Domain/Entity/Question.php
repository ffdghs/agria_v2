<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $response_1_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $response_2_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $response_3_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $response_4_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $answer_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $point_question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $difficulty_question;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameQuestion(): ?string
    {
        return $this->name_question;
    }

    public function setNameQuestion(string $name_question): self
    {
        $this->name_question = $name_question;

        return $this;
    }

    public function getResponse1Question(): ?string
    {
        return $this->response_1_question;
    }

    public function setResponse1Question(string $response_1_question): self
    {
        $this->response_1_question = $response_1_question;

        return $this;
    }

    public function getResponse2Question(): ?string
    {
        return $this->response_2_question;
    }

    public function setResponse2Question(string $response_2_question): self
    {
        $this->response_2_question = $response_2_question;

        return $this;
    }

    public function getResponse3Question(): ?string
    {
        return $this->response_3_question;
    }

    public function setResponse3Question(string $response_3_question): self
    {
        $this->response_3_question = $response_3_question;

        return $this;
    }

    public function getResponse4Question(): ?string
    {
        return $this->response_4_question;
    }

    public function setResponse4Question(string $response_4_question): self
    {
        $this->response_4_question = $response_4_question;

        return $this;
    }

    public function getAnswerQuestion(): ?string
    {
        return $this->answer_question;
    }

    public function setAnswerQuestion(string $answer_question): self
    {
        $this->answer_question = $answer_question;

        return $this;
    }

    public function getPointQuestion(): ?string
    {
        return $this->point_question;
    }

    public function setPointQuestion(string $point_question): self
    {
        $this->point_question = $point_question;

        return $this;
    }

    public function getDifficultyQuestion(): ?string
    {
        return $this->difficulty_question;
    }

    public function setDifficultyQuestion(string $difficulty_question): self
    {
        $this->difficulty_question = $difficulty_question;

        return $this;
    }
}
