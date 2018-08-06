<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Registry;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * CategoryRepository constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {

        $this->doctrine = $doctrine->getManager();
    }


    /**
     * @return Category[]|null
     */
    public function getAllCategories(): ?array
    {
        return $this->doctrine->getRepository(Category::class)->findAll()?? null;
    }

    /**
     * @param Category $category
     */
    public function saveCategory(Category $category): void
    {
        $this->doctrine->persist($category);
        $this->doctrine->flush();
    }

    /**
     * @param Category $category
     */
    public function deleteCategory(Category $category): void
    {
        $this->doctrine->remove($category);
        $this->doctrine->flush();
    }

    /**
     * @param int $id
     * @return null|Category
     */
    public function findOneById(int $id): ?Category
    {
        return $this->doctrine->getRepository(Category::class)->findOneBy(['id' => $id])?? null;
    }

    /**
     * @param string $name
     * @return null|Category
     */
    public function findOneByName(string $name): ?Category
    {
        return $this->doctrine->getRepository(Category::class)->findOneBy(['name' => $name])?? null;
    }

}