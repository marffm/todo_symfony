<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TodoBundle\Infrastructure\Helper\ReturnFormatter;

class CategoryController extends FOSRestController
{

    /**
     * @Rest\Get("/categories")
     * @return View
     */
    public function getCategoriesAction(): View
    {
        $searchCategory = $this->get('action.search.categories');
        $response = $searchCategory->fetchAllCategories();

        return $this->view(
            ReturnFormatter::successReturn(
                $response,
                'Categories returned correctly.',
                Response::HTTP_OK
            ),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Post("/insertCategories")
     * @param Request $request
     * @return View
     */
    public function postInsertCategoryAction(Request $request): View
    {
        $data = $request->request->get('data');
        $insertCategory = $this->get('action.insert.category');
        $response = $insertCategory->insertCategory($data);

        return $this->view(
            ReturnFormatter::successReturn($response, 'Category Inserted.', Response::HTTP_OK),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Put("/updateCategory/{categoryId}")
     * @param Request $request
     * @return View
     */
    public function putUpdateCategoryAction(Request $request): View
    {
        $idCategory = $request->get('categoryId');
        $data = $request->request->get('data');

        $updateCategory = $this->get('action.update.category');
        $response = $updateCategory->updateCategoryAction($idCategory, $data);

        return $this->view(
            ReturnFormatter::successReturn($response, 'Category Updated', Response::HTTP_OK),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Delete("/deleteCategory/{categoryId}")
     * @param Request $request
     * @return View
     */
    public function deleteCategoryAction(Request $request): View
    {
        $idCategory = $request->get('categoryId');

        $deleteCategory = $this->get('action.delete.category');
        $response = $deleteCategory->deleteCategory($idCategory);
        return $this->view(
            ReturnFormatter::successReturn($response, 'Category Deleted', Response::HTTP_OK),
            Response::HTTP_OK
        );
    }

}