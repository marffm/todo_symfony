<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\Exception;

class CategoryInformationsNeeded extends \RuntimeException
{

    public static function fromNullName(): self
    {
        throw new self('Name is needed to update Category.');
    }

}