<?php
declare(strict_types=1);

namespace Test\TodoBundle\Unit\Domain\Category\Service;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use TodoBundle\Domain\Category\DTOInterface\UpdateCategoryDTOInterface;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;
use TodoBundle\Domain\Category\Service\UpdateCategory;

class UpdateCategoryTest extends TestCase
{
    /** @var MockObject */
    private $categoryRepository;

    private $updateCategoryDTO;

    public function setUp(): void
    {
        $this->categoryRepository = $this->getMockBuilder(CategoryRepositoryInterface::class)->getMock();

        $this->updateCategoryDTO = $this->getMockBuilder(UpdateCategoryDTOInterface::class)->getMock();
        $this->updateCategoryDTO->method('getId')->willReturn(1);
        $this->updateCategoryDTO->method('getName')->willReturn('Name Test');
        $this->updateCategoryDTO->method('getDescription')->willReturn('Description Test');

    }

    /**
     * @test
     */
    public function updateCategoryMustWork(): void
    {
        $categoryEntity = new Category('Test', 'Test description');
        $this->categoryRepository->method('findOneById')->willReturn($categoryEntity);

        $updateCategoryService = new UpdateCategory($this->categoryRepository);
        $response = $updateCategoryService->updateCategory($this->updateCategoryDTO);

        $this->assertEquals('Name Test', $response->getName());
        $this->assertEquals('Description Test', $response->getDescription());

    }

    /**
     * @test
     * @expectedException \TodoBundle\Domain\Category\Exception\CategoryNotFound
     */
    public function mustReturnExceptionCategoryNotFound(): void
    {
        $this->categoryRepository->method('findOneById')->willReturn(null);
        $updateCategoryService = new UpdateCategory($this->categoryRepository);
        $updateCategoryService->updateCategory($this->updateCategoryDTO);
    }

    /**
     * @test
     * @expectedException \TodoBundle\Domain\Category\Exception\CategoryExists
     */
    public function mustThrowExceptionCategoryAlreadyExistsWithTheName(): void
    {
        $categoryEntity = new Category('Test', 'Test description');
        $this->categoryRepository->method('findOneById')->willReturn($categoryEntity);

        $this->categoryRepository->method('findOneByName')->willReturn($categoryEntity);
        $updateCategory = new UpdateCategory($this->categoryRepository);
        $updateCategory->updateCategory($this->updateCategoryDTO);

    }


}