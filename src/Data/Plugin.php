<?php

declare(strict_types=1);

namespace WebGarden\Mounds\Data;

use ArrayObject;
use JsonSerializable;

/**
 * @property-read string $name
 * @property-read string $description
 * @property-read string $url
 * @property-read int $stars
 * @property-read string|null $license
 */
final class Plugin extends ArrayObject implements JsonSerializable
{
    public function __construct(
        string $name,
        string $description,
        string $url,
        int $stars,
        string $license = null
    ) {
        parent::__construct(
            compact('name', 'description', 'url', 'stars', 'license'),
            self::ARRAY_AS_PROPS
        );
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function jsonSerialize(): array
    {
        return $this->getArrayCopy();
    }
}
