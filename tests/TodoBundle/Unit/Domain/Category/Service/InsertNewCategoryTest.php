<?php
declare(strict_types=1);

namespace Test\TodoBundle\Unit\Domain\Category\Service;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use TodoBundle\Domain\Category\DTOInterface\InsertCategoryDTOInterface;
use TodoBundle\Domain\Category\Entity\Category;
use TodoBundle\Domain\Category\RepositoryInterface\CategoryRepositoryInterface;
use TodoBundle\Domain\Category\Service\InsertNewCategory;

class InsertNewCategoryTest extends TestCase
{

    /**
     * @var MockObject
     */
    private $categoryRepository;

    /**
     * @var MockObject
     */
    private $categoryDTO;




    public function setUp(): void
    {
        $this->categoryRepository = $this->getMockBuilder(CategoryRepositoryInterface::class)->getMock();

        $this->categoryDTO = $this->getMockBuilder(InsertCategoryDTOInterface::class)->getMock();
        $this->categoryDTO->method('getName')->willReturn('Test Unit');
        $this->categoryDTO->method('getDescription')->willReturn('Test decsription');

    }

    /**
     * @test
     */
    public function actionInsertNewCategoryMustWork(): void
    {
        $this->categoryRepository->method('findOneByName')->willReturn(null);

        $insertNewCategory = new InsertNewCategory($this->categoryRepository);
        $insertNewCategory->insertCategory($this->categoryDTO);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @expectedException \TodoBundle\Domain\Category\Exception\CategoryExists
     */
    public function actionInsertNewCategoryMustThrowExceptionUserExistent(): void
    {
        $categoryEntity = Category::fromInsertCategoryDTO($this->categoryDTO);

        $this->categoryRepository->method('findOneByName')->willReturn($categoryEntity);
        $insertNewCategory = new InsertNewCategory($this->categoryRepository);
        $insertNewCategory->insertCategory($this->categoryDTO);
    }

}