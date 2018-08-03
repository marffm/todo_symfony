<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Entity;

use Doctrine\ORM\Mapping as ORM;
use TodoBundle\Domain\Category\DTOInterface\InsertCategoryDTOInterface;

/**
 * Class Category
 * @package TodoBundle\Domain\Category
 *
 * @ORM\Entity
 * @ORM\Table(name="category", options={"charset"="utf8"})
 */
class Category
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(name="id", nullable=false, type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * Category constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
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
     * @param InsertCategoryDTOInterface $insertCategoryDTO
     * @return Category
     */
    public static function fromInsertCategoryDTO(InsertCategoryDTOInterface $insertCategoryDTO): self
    {
        return new self(
            $insertCategoryDTO->getName(),
            $insertCategoryDTO->getDescription()
        );
    }


}