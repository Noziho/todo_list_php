<?php

namespace App\controller;

abstract class AbstractController
{

    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     * Render function for printing view.
     */
    public function render(string $template, array $data = []): void
    {
        ob_start();
        require_once __DIR__ . "/../../view/" . $template . ".html.php";
        $html = ob_get_clean();
        require_once __DIR__ . "/../../view/base.html.php";
    }

}