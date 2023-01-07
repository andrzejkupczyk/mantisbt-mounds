<?php

declare(strict_types=1);

namespace WebGarden\Mounds;

use WebGarden\Mounds\Data\Plugin;

final class PluginFactory
{
    /**
     * @param array{name: string, description: string, url: string, stars: int, license: ?string} $data
     */
    public function makeFromArray(array $data): Plugin
    {
        return new Plugin(
            $data['name'],
            (string) $data['description'],
            $data['url'],
            (int) $data['stars'],
            $data['license'] ?? null
        );
    }

    /**
     * @param object $repository
     */
    public function makeFromGitHubRepository($repository): Plugin
    {
        return self::makeFromArray([
            $repository->full_name,
            $repository->description,
            $repository->html_url,
            $repository->stargazers_count,
            $repository->license->spdx_id ?? null,
        ]);
    }

    public function makeFromJson(string $json): Plugin
    {
        return self::makeFromArray(json_decode($json, true));
    }
}
