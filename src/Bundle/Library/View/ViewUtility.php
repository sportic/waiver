<?php

namespace Sportic\Waiver\Bundle\Library\View;

class ViewUtility
{
    public static function registerViewPaths($view)
    {
        $path = realpath(__DIR__ . '/../../Resources/views/admin');
        $view->addPath($path);
        $view->addPath($path, 'SporticWaiver');
    }
}
