<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Service;

use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\Exception\CategoryHasTodo;
use TodoBundle\Domain\Category\Exception\CategoryNotFound;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryTodoRepositoryInterface;

class DeleteCategory
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;
    /**
     * @var CategoryTodoRepositoryInterface
     */
    private $todoRepository;

    /**
     * DeleteCategory constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryTodoRepositoryInterface $todoRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryTodoRepositoryInterface $todoRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->todoRepository = $todoRepository;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function deleteCategory(int $id): Category
    {
        $category = $this->getCategory($id);
        $this->checkTheresTodoWithThisCategory($id);
        $this->categoryRepository->deleteCategory($category);

        return $category;
    }

    /**
     * @param int $id
     * @return Category
     */
    private function getCategory(int $id): Category
    {
        $category = $this->categoryRepository->findOneById($id);
        if (null === $category) {
            throw CategoryNotFound::categoryIdNotFound($id);
        }
        return $category;
    }

    /**
     * @param int $id
     */
    private function checkTheresTodoWithThisCategory(int $id): void
    {
        if (null !== $this->todoRepository->getTodoByCategoryId($id)) {
            throw CategoryHasTodo::fromCategoryRegistered($id);
        }
    }

}