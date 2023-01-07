<?php

declare(strict_types=1);

namespace WebGarden\Mounds;

use Generator;
use RuntimeException;
use SplFileObject;

/**
 * @return \Generator|\WebGarden\Mounds\Data\Plugin[]
 */
function fetch_plugin_repositories(string $source): Generator
{
    /** @var array $sources */
    $sources = plugin_config_get('sources');

    if (!array_key_exists($source, $sources)) {
        throw new RuntimeException("Plugins source \"{$source}\" is not supported.");
    }

    $pluginFactory = new PluginFactory();
    $file = new SplFileObject($sources[$source]);

    foreach ($file as $line) {
        if (!$file->eof()) {
            yield $pluginFactory->makeFromJson($line);
        }
    }
}

function print_plugin_repository_link(string $name, string $url)
{
    $parts = explode('/', $name, 2);

    print_link($url, "{$parts[0]} / <strong>{$parts[1]}</strong>");
}
