<?php

declare(strict_types=1);

namespace Config\bootstrap;

use Illuminate\Foundation\Application as FoundationApplication;

class Application extends FoundationApplication
{
    public function basePath($path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . rtrim($path);
    }

    public function bootstrapPath($path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . rtrim($path);
    }

    public function configPath($path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'laravel' . DIRECTORY_SEPARATOR . rtrim($path);
    }

    public function publicPath($path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . rtrim($path);
    }

    public function storagePath($path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . rtrim($path);
    }
}
