<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Todo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Todo
 * @package TodoBundle\Domain\Todo\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="todos", options={"charset"="utf8"})
 */
class Todo
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer", nullable=false, unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $description;
    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="TodoBundle\Domain\Category\Entity\Category", cascade={"all"}, fetch="LAZY")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categoryId;
    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="TodoBundle\Domain\User\Entity\User", cascade={"all"}, fetch="LAZY")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;
    /**
     * @var \DateTime
     * @ORM\Column(name="finish_date", type="datetime", nullable=false)
     */
    private $finishDate;
    /**
     * @var \DateTime
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * Todo constructor.
     * @param string $name
     * @param string $description
     * @param int $categoryId
     * @param int $userId
     * @param \DateTime $finishDate
     * @param \DateTime $createdDate
     */
    public function __construct(
        string $name,
        string $description,
        int $categoryId,
        int $userId,
        \DateTime $finishDate,
        \DateTime $createdDate
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->userId = $userId;
        $this->finishDate = $finishDate;
        $this->createdDate = $createdDate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return \DateTime
     */
    public function getFinishDate(): \DateTime
    {
        return $this->finishDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }



}