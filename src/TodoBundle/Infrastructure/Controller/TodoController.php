<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TodoBundle\Infrastructure\Helper\ReturnFormatter;

class TodoController extends FOSRestController
{
    /**
     * Return all articles
     * @Rest\Get("/todos")
     */
    public function getTodosAction(): View
    {
        $searchTodo = $this->get('action.search.todos');
        $data = $searchTodo->fetchTodos();
        return $this->view(
            ReturnFormatter::successReturn($data, 'Todos returned correctly.', Response::HTTP_OK),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("todo/{id}", name="Todo", methods={"GET"})
     *
     * @param string $id
     * @return View
     */
    public function getTodoAction(string $id): View
    {
        return $this->json(['data' => 'id passed ' . $id]);
    }

}