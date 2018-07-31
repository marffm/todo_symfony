<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{

    /**
     * @Route("/categories", name="Categories", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getCategoriesAction(): JsonResponse
    {
        return $this->json(['data' => 'Category'], 200);
    }

}