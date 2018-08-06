<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Registry;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryTodoRepositoryInterface;
use TodoBundle\Domain\Todo\Entity\Todo;
use TodoBundle\Domain\Todo\RepositoryInterface\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface, CategoryTodoRepositoryInterface
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * TodoRepository constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine->getManager();

    }

    /**
     * @return array|null
     */
    public function fetchAllTodos(): ?array
    {
        return $this->doctrine->getRepository(Todo::class)->findAll()?? null;
    }

    /**
     * @param int $categoryId
     * @return null|Todo
     */
    public function getTodoByCategoryId(int $categoryId): ?Todo
    {
        return $this->doctrine->getRepository(Todo::class)->findOneBy(['category' => $categoryId])?? null;
    }


}