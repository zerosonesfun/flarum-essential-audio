<?php

namespace ZerosOnesFun\EssentialAudio\Upload;

use Flarum\Foundation\AbstractServiceProvider;
use FoF\Upload\Contracts\Template;
use FoF\Upload\File;
use FoF\Upload\Helpers\Util;

class DownloadTemplate implements Template
{
    public function tag(): string
    {
        return 'audio-dl';
    }

    public function name(): string
    {
        return 'Audio w/ Download [play][/play]';
    }

    public function description(): string
    {
        return 'Audio template for Essential Audio extension.';
    }

    public function preview(File $file): string
    {
        return '[play]' . $file->url . '[/play]';
        return '[download]' . $file->url . '[/download]';
    }
}

class DownloadServiceProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->container->make(Util::class)->addRenderTemplate($this->container->make(DownloadTemplate::class));
    }
}