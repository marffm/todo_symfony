<?php
declare(strict_types=1);

namespace TodoBundle\Application\Action;

use TodoBundle\Domain\Category\Entity\Category;
use \TodoBundle\Domain\Category\Service\DeleteCategory as DeleteCategoryService;

class DeleteCategory
{
    /**
     * @var DeleteCategoryService
     */
    private $deleteCategoryService;

    /**
     * DeleteCategory constructor.
     * @param DeleteCategoryService $deleteCategoryService
     */
    public function __construct(DeleteCategoryService $deleteCategoryService)
    {
        $this->deleteCategoryService = $deleteCategoryService;
    }

    /**
     * @param string $id
     * @return Category
     */
    public function deleteCategory(string $id): Category
    {
        return $this->deleteCategoryService->deleteCategory((int)$id);
    }

}