<?php

namespace Php\template;

class Template
{
    public function template($view, $data = []) {
        extract($data);

        ob_start();
    
        require $view;

        $output = ob_get_clean();

        return $output;
    }
}