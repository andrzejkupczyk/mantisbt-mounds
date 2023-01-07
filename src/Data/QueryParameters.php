<?php

declare(strict_types=1);

namespace WebGarden\Mounds\Data;

interface QueryParameters
{
    public function __toString(): string;

    public function query(): string;

    public function pagination(): Pagination;
}
