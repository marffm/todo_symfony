<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Exception;


class CategoryExists extends \RuntimeException
{

    /**
     * @param string $name
     * @return CategoryExists
     */
    public static function categoryWithNameExists(string $name): self
    {
        return new self(sprintf('Catogory with name "%s" already exists', $name));
    }

}