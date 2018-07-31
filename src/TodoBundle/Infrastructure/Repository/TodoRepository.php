<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Repository;

use Doctrine\ORM\EntityManager;
use TodoBundle\Domain\Todo\RepositoryInterface\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $doctrine;

    /**
     * TodoRepository constructor.
     * @param EntityManager $doctrine
     */
    public function __construct(EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    public function fetchAllTodos()
    {
        echo '<pre>' .var_dump($this->doctrine);die;
    }


}