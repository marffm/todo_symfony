<?php
namespace TodoBundle\Domain\Category\DTOInterface;

interface InsertCategoryDTOInterface
{
    public function getName(): string;

    public function getDescription(): string;

}
