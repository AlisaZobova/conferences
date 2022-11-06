<?php

namespace BaseView;

class View
{

    function layoutContent($template_view, $data)
    {
        ob_start();
        require_once realpath(dirname(__FILE__) . '/../views/'.$template_view);
        return ob_get_clean();

    }

    function renderOnlyView($content_view, $data)
    {
        ob_start();
        require_once realpath(dirname(__FILE__) . '/../views/'.$content_view);
        return ob_get_clean();
    }

    function generate($content_view, $template_view, $data = null)
    {
//        $layoutContent = $this->layoutContent($template_view, $data);
//        $viewContent = $this->renderOnlyView($content_view, $data);
//        return str_replace('{{content}}', $viewContent, $layoutContent);
//        return $this->renderOnlyView('main_view.php', $data);
//        require_once realpath(dirname(__FILE__) . '/../views/'.$content_view);
        require_once realpath(dirname(__FILE__) . '/../views/'.$content_view);
//        require_once realpath(dirname(__FILE__) . '/../views/'.$template_view);
    }
}

//$view = new View();
//echo $view->generate('main_view.php', 'base_view.php', [1, 2, 3, 4, 5]);