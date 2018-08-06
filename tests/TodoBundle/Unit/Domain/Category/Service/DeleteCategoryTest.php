<?php
declare(strict_types=1);

namespace Test\TodoBundle\Unit\Domain\Category\Service;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryTodoRepositoryInterface;
use TodoBundle\Domain\Category\Service\DeleteCategory;
use TodoBundle\Domain\Todo\Entity\Todo;

class DeleteCategoryTest extends TestCase
{

    /** @var MockObject */
    private $categoryRepository;

    /** @var MockObject */
    private $todoRepository;

    /** @var MockObject */
    private $categoryEntity;

    /** @var MockObject */
    private $todoEntity;

    public function setUp(): void
    {
        $this->categoryRepository = $this->getMockBuilder(CategoryRepositoryInterface::class)->getMock();

        $this->todoRepository = $this->getMockBuilder(CategoryTodoRepositoryInterface::class)->getMock();

        $this->categoryEntity = $this->getMockBuilder(Category::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->todoEntity = $this->getMockBuilder(Todo::class)->disableOriginalConstructor()->getMock();

    }


    public function deleteCategoryMustWork(): void
    {
        $this->categoryRepository->method('findOneById')->willReturn($this->categoryEntity);
        $this->todoRepository->method('getTodoByCategoryId')->willReturn(null);

        $updateCategory = new DeleteCategory($this->categoryRepository, $this->todoRepository);
        $response = $updateCategory->deleteCategory(1);

        $this->assertTrue($response??false);

    }

    /**
     * @test
     * @expectedException \TodoBundle\Domain\Category\Exception\CategoryNotFound
     */
    public function deleteCategoryMustThrowExceptionOfNotFoundCategory(): void
    {
        $this->categoryRepository->method('findOneById')->willReturn(null);

        $deleteCategory = new DeleteCategory($this->categoryRepository, $this->todoRepository);
        $deleteCategory->deleteCategory(1);
    }

    /**
     * @test
     * @expectedException \TodoBundle\Domain\Category\Exception\CategoryHasTodo
     */
    public function deleteCategoryMustThrowExceptionOfCategoryHasTodo(): void
    {
        $this->categoryRepository->method('findOneById')->willReturn($this->categoryEntity);
        $this->todoRepository->method('getTodoByCategoryId')->willReturn($this->todoEntity);

        $deleteCategory = new DeleteCategory($this->categoryRepository, $this->todoRepository);
        $deleteCategory->deleteCategory(1);
    }

}