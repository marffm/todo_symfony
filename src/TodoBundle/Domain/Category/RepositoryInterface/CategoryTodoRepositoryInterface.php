<?php
namespace TodoBundle\Domain\Category\RepositoryInterface;

use TodoBundle\Domain\Todo\Entity\Todo;

interface CategoryTodoRepositoryInterface
{

    public function getTodoByCategoryId(int $id): ?Todo;

}