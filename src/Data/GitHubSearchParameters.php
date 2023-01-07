<?php

declare(strict_types=1);

namespace WebGarden\Mounds\Data;

final class GitHubSearchParameters implements QueryParameters
{
    /**
     * @var string
     */
    protected $query = 'topic:mantisbt-plugin';

    /**
     * @var \WebGarden\Mounds\Data\Pagination
     */
    protected $pagination;

    /**
     * @var string
     */
    protected $sort = 'stars';

    public function __construct(Pagination $pagination)
    {
        $this->pagination = clone $pagination;
    }

    public function __toString(): string
    {
        return http_build_query([
            'q' => $this->query,
            'sort' => $this->sort,
            'page' => $this->pagination->page(),
            'per_page' => $this->pagination->perPage(),
        ]);
    }

    public function query(): string
    {
        return $this->query;
    }

    public function pagination(): Pagination
    {
        return $this->pagination;
    }
}
