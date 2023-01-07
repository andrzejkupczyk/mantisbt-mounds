<?php

declare(strict_types=1);

namespace WebGarden\Mounds\Sources;

use Generator;
use JsonMachine\Items;
use WebGarden\Mounds\Data\GitHubSearchParameters;
use WebGarden\Mounds\Data\Pagination;
use WebGarden\Mounds\Data\QueryParameters;
use WebGarden\Mounds\PluginFactory;

final class GitHub
{
    protected $apiUrl = 'https://api.github.com/search/repositories';

    /**
     * @var \WebGarden\Mounds\PluginFactory
     */
    protected $factory;

    public function __construct()
    {
        $this->factory = new PluginFactory();
    }

    /**
     * @return \WebGarden\Mounds\Data\Plugin[]|\Generator
     * @throws \JsonMachine\Exception\InvalidArgumentException
     *
     */
    public function fetchAll(): Generator
    {
        $parameters = new GitHubSearchParameters(new Pagination(1, 100));

        do {
            $repositories = $this->fetch($parameters);

            foreach ($repositories as $repository) {
                yield $this->factory->makeFromGitHubRepository($repository);
            }

            $parameters->pagination()->nextPage();
        } while ($repositories->getIterator()->valid());
    }

    /**
     * @throws \JsonMachine\Exception\InvalidArgumentException
     */
    private function fetch(QueryParameters $parameters): Items
    {
        $url = "{$this->apiUrl}?{$parameters}";
        $context = $this->createContext();

        $repositories = file_get_contents($url, false, $context);

        return Items::fromString($repositories, ['pointer' => '/items']);
    }

    /**
     * @return resource
     */
    private function createContext()
    {
        return stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP',
                ],
            ],
        ]);
    }
}
