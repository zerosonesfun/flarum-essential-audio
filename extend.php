<?php

/*
 * This file is part of zerosonesfun/flarum-essential-audio.
 *
 * Copyright (c) 2021 Billy Wilcosky.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace ZerosOnesFun\EssentialAudio;

use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Formatter)
    ->configure(function (Configurator $config) {
        $config->BBCodes->addCustom(
            '[play]{URL}[/play]',
            '<div id="player_box">
             <div>
                <div class="essential_audio" data-url="{URL}"><span class="no_js"><a href="#" onClick="window.location.href=window.location.href">refresh to play</a></span></div>
             </div>
             </div>'
        );
        $config->BBCodes->addCustom(
            '[download]{URL}[/download]',
            '<div id="download-button-ea">
             <a href="{URL}" title="download" class="download-button-ea-link">Download (right-click)</a>
            </div>'
        );
    }),
    (new Extend\ServiceProvider())
    ->register(Upload\AudioServiceProvider::class),
    (new Extend\ServiceProvider())
    ->register(Upload\DownloadServiceProvider::class)
];