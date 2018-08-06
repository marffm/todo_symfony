<?php
namespace TodoBundle\Domain\Category\RepositoryInterface;

use TodoBundle\Domain\Category\Entity\Category;

interface CategoryRepositoryInterface
{

    public function getAllCategories(): ?array;

    public function saveCategory(Category $category): void;

    public function deleteCategory(Category $category): void;

    public function findOneById(int $id): ?Category;

    public function findOneByName(string $name): ?Category;

}