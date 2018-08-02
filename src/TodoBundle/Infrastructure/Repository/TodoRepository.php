<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Registry;
use TodoBundle\Domain\Todo\Entity\Todo;
use TodoBundle\Domain\Todo\RepositoryInterface\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
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
        $this->doctrine = $doctrine->getRepository(Todo::class);

    }

    /**
     * @return array|null
     */
    public function fetchAllTodos(): ?array
    {
        return $this->doctrine->findAll()?? null;
    }


}