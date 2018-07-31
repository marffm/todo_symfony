<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Todo\Service;

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

    public function fetchAllTodos()
    {
        $this->todoRepository->fetchAllTodos();
    }
}