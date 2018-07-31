<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{

    /**
     * @Route("/users", name="Users", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getUsersAction(): JsonResponse
    {
        return $this->json(['data' => 'users'], 200);
    }

}