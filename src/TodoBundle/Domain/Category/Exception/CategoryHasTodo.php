<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Exception;

class CategoryHasTodo extends \RuntimeException
{

    /**
     * @param $id
     * @return CategoryHasTodo
     */
    public static function fromCategoryRegistered($id): self
    {
        return new self(sprintf('Category with id %s is in use.', $id));
    }

}