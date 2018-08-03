<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Service;

use TodoBundle\Domain\Category\DTOInterface\InsertCategoryDTOInterface;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\Exception\CategoryExists;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;

class InsertNewCategory
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $repository;

    public function __construct(
        CategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param InsertCategoryDTOInterface $insertCategoryDTO
     * @return Category
     */
    public function insertCategory(InsertCategoryDTOInterface $insertCategoryDTO): Category
    {
        $this->checkNameAlreadyExists($insertCategoryDTO->getName());

        $categoryEntity = Category::fromInsertCategoryDTO($insertCategoryDTO);

        $this->saveCategory($categoryEntity);

        return $categoryEntity;

    }

    /**
     * @param string $name
     */
    private function checkNameAlreadyExists(string $name): void
    {
        if (null !== $this->repository->findOneByName($name)) {
            throw CategoryExists::categoryWithNameExists($name);
        }
    }

    /**
     * @param Category $category
     */
    private function saveCategory(Category $category): void
    {
        $this->repository->saveCategory($category);
    }


}