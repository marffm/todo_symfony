<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Exception;

class CategoryNotFound extends \RuntimeException
{

    /**
     * @param int $id
     * @return CategoryNotFound
     */
    public static function categoryIdNotFound(int $id): self
    {
        return new self(sprintf('Category with id "%s" not found', $id));
    }

}
