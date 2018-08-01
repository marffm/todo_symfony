<?php
declare(strict_types=1);

namespace TodoBundle\Application\Action;

use TodoBundle\Domain\Todo\Service\FetchAllTodos;

class SearchTodo
{
    /**
     * @var FetchAllTodos
     */
    private $fetchAllTodos;

    public function __construct(FetchAllTodos $fetchAllTodos)
    {
        $this->fetchAllTodos = $fetchAllTodos;
    }


    public function fetchTodos(): ?array
    {
        // Here we create our DTO to passa data into a service
        return $this->fetchAllTodos->fetchAllTodos();
    }


}