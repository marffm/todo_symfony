<?php
declare(strict_types=1);

namespace TodoBundle\Application\Exception;

class CategoryInvalidArguments extends \InvalidArgumentException
{

    /**
     * @return CategoryInvalidArguments
     */
    public static function missCategoryName(): self
    {
        return new self('Error: In order to register a category you must provide a name.');
    }

    public static function missCategoryDescription(): self
    {
        return new self('Error: In order to register a category you must provide a description.');
    }

}