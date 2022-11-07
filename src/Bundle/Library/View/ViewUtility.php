<?php

namespace Sportic\Waiver\Bundle\Library\View;

class ViewUtility
{
    public static function registerViewPaths($view, $module = null): void
    {
        $path = realpath(__DIR__ . '/../../Resources/views/'. $module);
        $view->addPath($path);
        $view->addPath($path, 'SporticWaiver');
    }
}
