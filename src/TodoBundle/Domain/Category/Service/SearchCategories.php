<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Service;

use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;

class SearchCategories
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return array|null
     */
    public function searchCategories(): ?array
    {
        return $this->categoryRepository->getAllCategories()?? null;
    }

}