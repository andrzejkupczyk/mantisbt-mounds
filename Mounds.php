<?php

declare(strict_types=1);

use WebGarden\Termite\TermitePlugin;

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    require_once __DIR__ . '/../../vendor/autoload.php';
}

final class MoundsPlugin extends TermitePlugin
{
    const VERSION = '1.0.0';

    public function register()
    {
        parent::register();

        $this->author = 'Andrzej Kupczyk';
        $this->contact = 'kontakt@andrzejkupczyk.pl';
        $this->url = 'https://github.com/andrzejkupczyk/mantisbt-mounds';
        $this->version = self::VERSION;
    }

    public function config(): array
    {
        return [
            'sources' => [
                'github' => __DIR__ . '/sources/github.jsonl',
            ],
        ];
    }

    public function hooks(): array
    {
        return [
            'EVENT_LAYOUT_CONTENT_END' => 'displayPluginDirectory',
        ];
    }

    public function displayPluginDirectory()
    {
        if (is_page_name('manage_plugin_page.php')) {
            include __DIR__ . '/components/directory.php';
        }
    }
}
