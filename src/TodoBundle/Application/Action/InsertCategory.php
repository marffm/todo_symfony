<?php
declare(strict_types=1);

namespace TodoBundle\Application\Action;

use TodoBundle\Application\DTO\InsertCategoryDTO;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\Service\InsertNewCategory;

class InsertCategory
{

    /**
     * @var InsertNewCategory
     */
    private $insertNewCategory;

    /**
     * InsertCategory constructor.
     * @param InsertNewCategory $insertNewCategory
     */
    public function __construct(InsertNewCategory $insertNewCategory)
    {
        $this->insertNewCategory = $insertNewCategory;
    }

    /**
     * @param array $data
     * @return Category
     */
    public function insertCategory(array $data): Category
    {
        $categoryDTO = InsertCategoryDTO::fromArray($data);
        return $this->insertNewCategory->insertCategory($categoryDTO);
    }

}