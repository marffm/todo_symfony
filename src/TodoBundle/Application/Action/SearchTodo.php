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


    public function fetchTodos()
    {
        $this->fetchAllTodos->fetchAllTodos();
    }


}