<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Todo\Service;

use TodoBundle\Domain\Todo\Entity\Todo;
use TodoBundle\Domain\Todo\RepositoryInterface\TodoRepositoryInterface;
use TodoBundle\Infrastructure\Repository\TodoRepository;

class FetchAllTodos
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;

    /**
     * FetchAllTodos constructor.
     * @param TodoRepositoryInterface $todoRepository
     */
    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @return Todo[]|null
     */
    public function fetchAllTodos(): ?array
    {
        // Here we can create whatever domain rule we need
        return $this->todoRepository->fetchAllTodos();
    }
}