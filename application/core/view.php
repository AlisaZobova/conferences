<?php

namespace Appllication\Core;

class View
{
    function generate($content_view, $data = null)
    {
        require_once realpath(dirname(__FILE__) . '/../views/' . $content_view);
    }
}
