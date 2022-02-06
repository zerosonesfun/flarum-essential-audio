<?php

namespace ZerosOnesFun\EssentialAudio\Upload;

use Flarum\Foundation\AbstractServiceProvider;
use FoF\Upload\Contracts\Template;
use FoF\Upload\File;
use FoF\Upload\Helpers\Util;

class AudioTemplate implements Template
{
    public function tag(): string
    {
        return 'audio';
    }

    public function name(): string
    {
        return 'Audio [play][/play]';
    }

    public function description(): string
    {
        return 'Audio template for Essential Audio extension.';
    }

    public function preview(File $file): string
    {
        return '[play]' . $file->url . '[/play]';
    }
}

class AudioServiceProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->container->make(Util::class)->addRenderTemplate($this->container->make(AudioTemplate::class));
    }
}