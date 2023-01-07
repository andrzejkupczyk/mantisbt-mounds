<?php

declare(strict_types=1);

namespace WebGarden\Mounds\Data;

final class Pagination
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $perPage;

    public function __construct(int $page, int $perPage)
    {
        $this->page = max(1, $page);
        $this->perPage = max(1, $perPage);
    }

    /**
     * @return int
     */
    public function page(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function perPage(): int
    {
        return $this->perPage;
    }

    public function nextPage(): self
    {
        $this->page += 1;

        return $this;
    }
}
