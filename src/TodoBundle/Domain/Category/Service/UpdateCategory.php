<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Service;

use TodoBundle\Domain\Category\DTOInterface\UpdateCategoryDTOInterface;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\Exception\CategoryExists;
use TodoBundle\Domain\Category\Exception\CategoryNotFound;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;

class UpdateCategory
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * UpdateCategory constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param UpdateCategoryDTOInterface $updateCategoryDTO
     * @return Category
     */
    public function updateCategory(UpdateCategoryDTOInterface $updateCategoryDTO): Category
    {
        $category = $this->getCategoryById($updateCategoryDTO->getId());
        $this->checkUpdatedName($updateCategoryDTO);
        $category->updateCategoryFromUpdateCategoryDTO($updateCategoryDTO);
        $this->categoryRepository->saveCategory($category);
        return $category;
    }

    /**
     * @param int $categoryId
     * @return Category
     */
    private function getCategoryById(int $categoryId): Category
    {
        $category = $this->categoryRepository->findOneById($categoryId);
        if (null === $category) {
            throw CategoryNotFound::categoryIdNotFound($categoryId);
        }
        return $category;
    }

    /**
     * @param UpdateCategoryDTOInterface $updateCategoryDTO
     */
    private function checkUpdatedName(UpdateCategoryDTOInterface $updateCategoryDTO): void
    {
        if (
            ($name = $updateCategoryDTO->getName()) !== null
            && null !== $this->categoryRepository->findOneByName($name)
        ) {
            throw CategoryExists::categoryWithNameExists($name);
        }
    }


}