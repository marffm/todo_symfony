<?php
declare(strict_types=1);

namespace TodoBundle\Application\DTO;

use TodoBundle\Domain\Category\DTOInterface\UpdateCategoryDTOInterface;

class UpdateCategoryDTO implements UpdateCategoryDTOInterface
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var null|string
     */
    private $name;
    /**
     * @var null|string
     */
    private $description;

    /**
     * UpdateCategoryDTO constructor.
     * @param int $id
     * @param null|string $name
     * @param null|string $description
     */
    public function __construct(
        int $id,
        ?string $name,
        ?string $description
    ) {
        $this->id = $id;
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param int $id
     * @param array $data
     * @return UpdateCategoryDTO
     */
    public static function fromUpdateAction(int $id, array $data): self
    {
        return new self(
            $id,
            $data['name']?? null,
            $data['description']?? null
        );
    }

}