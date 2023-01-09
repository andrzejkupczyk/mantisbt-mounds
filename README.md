# MantisBT Mounds

![PHP requirement](https://img.shields.io/packagist/php-v/webgarden/mantisbt-mounds?logo=php&style=flat-square)
![GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/andrzejkupczyk/mantisbt-mounds?sort=semver&style=flat-square)
[![GitHub license](https://img.shields.io/github/license/andrzejkupczyk/mantisbt-mounds?style=flat-square)](https://github.com/andrzejkupczyk/mantisbt-mounds/blob/main/LICENSE "License")

MantisBT plugin browser that aggregates plugins from various sources, allowing administrators to browse the directory and discover new plugins.

If you find this plugin useful, feel free to try [my other plugins](https://github.com/search?q=user%3Aandrzejkupczyk+topic%3Amantisbt-plugin) as well.

## Installation

MantisBT Mounds is packaged with [Composer](https://getcomposer.org/) 
and uses [composer installers](https://github.com/composer/installers) library 
to install the plugin in the `plugins/Mounds` directory:

`composer require webgarden/mantisbt-mounds`

### Old school alternative

If you prefer to avoid modifying the original MantisBT `composer.json` file, 
you can follow these steps:
- download or clone the repository and place it under the MantisBT plugins folder
- rename the folder to Mounds
- cd into plugin's folder and run `composer install --no-dev`

## Functionality

### Plugin management page

![image](https://user-images.githubusercontent.com/11018286/211188753-3d4714e5-89df-4f04-8b72-4b113c557c4d.png)

## Translations

Supported languages are: :gb: :poland:
