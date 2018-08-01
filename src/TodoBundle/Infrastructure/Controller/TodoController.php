<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use TodoBundle\Domain\Todo\Entity\Todo;

class TodoController extends Controller
{
    /**
     * @Route("/", name="Todos", methods={"GET"})
     */
    public function getTodosAction(): JsonResponse
    {
        $searchTodo = $this->get('action.search.todos');
        $data = $searchTodo->fetchTodos();
        echo '<pre>' .var_dump($data);die;

        return $this->json(['data' => 'action']);
    }

    /**
     * @Route("todo/{id}", name="Todo", methods={"GET"})
     *
     * @param string $id
     * @return JsonResponse
     */
    public function getTodoAction(string $id): JsonResponse
    {
        return $this->json(['data' => 'id passed ' . $id]);
    }

}