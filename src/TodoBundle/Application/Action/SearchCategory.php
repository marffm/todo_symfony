<?php
declare(strict_types=1);

namespace TodoBundle\Application\Action;

use TodoBundle\Domain\Category\Service\SearchCategories;

class SearchCategory
{

    /**
     * @var SearchCategories
     */
    private $searchCategories;

    /**
     * SearchCategory constructor.
     * @param SearchCategories $searchCategories
     */
    public function __construct(SearchCategories $searchCategories)
    {
        $this->searchCategories = $searchCategories;
    }

    /**
     * @return array|null
     */
    public function fetchAllCategories(): ?array
    {
        return  $this->searchCategories->searchCategories();
    }

}