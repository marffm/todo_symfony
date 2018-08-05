<?php
declare(strict_types=1);

namespace TodoBundle\Application\Action;

use TodoBundle\Application\DTO\UpdateCategoryDTO;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\Service\UpdateCategory as UpdateCategoryService;

class UpdateCategory
{

    /**
     * @var UpdateCategoryService
     */
    private $updateCategory;

    /**
     * UpdateCategory constructor.
     * @param UpdateCategoryService $updateCategory
     */
    public function __construct(UpdateCategoryService $updateCategory)
    {
        $this->updateCategory = $updateCategory;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Category
     */
    public function updateCategoryAction(string $id, array $data): Category
    {
        $categoryDTO = UpdateCategoryDTO::fromUpdateAction((int)$id, $data);
        return $this->updateCategory->updateCategory($categoryDTO);
    }

}