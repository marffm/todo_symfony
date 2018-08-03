<?php
declare(strict_types=1);

namespace TodoBundle\Application\DTO;

use TodoBundle\Application\Exception\CategoryInvalidArguments;
use TodoBundle\Domain\Category\DTOInterface\InsertCategoryDTOInterface;

class InsertCategoryDTO implements InsertCategoryDTOInterface
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;

    /**
     * InsertCategoryDTO constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
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
     * @param array $data
     * @return InsertCategoryDTO
     */
    public static function fromArray(array $data): self
    {
        if (isset($data['name']) && null === $data['name']) {
            throw CategoryInvalidArguments::missCategoryName();
        }

        if (isset($data['description']) && null === $data['description']) {
            throw CategoryInvalidArguments::missCategoryDescription();
        }

        return new self(
            $data['name'],
            $data['description']
        );
    }




}