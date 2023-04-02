<?php

namespace App\Controllers;

use App\Exceptions\ViewNotFoundException;

class View
{

    /**
     * @param string $view
     * @param array $params
     */
    public function __construct(protected string $view, protected array $params = [])
    {

    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(): bool|string
    {
        $viewPath = VIEW_PATH . "/" . $this->view . ".php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $viewPath;

        return (string)ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}