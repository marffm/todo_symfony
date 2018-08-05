<?php
declare(strict_types=1);

namespace TodoBundle\Domain\Category\DTOInterface;

interface UpdateCategoryDTOInterface
{

    public function getId(): int;

    public function getName(): ?string;

    public function getDescription(): ?string;

}