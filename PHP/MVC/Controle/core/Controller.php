<?php

class Controller
{
    public $vars = [];

    /**
     * @param $variables array
     */
    public function set($variables)
    {
        $this->vars = array_merge($this->vars, $variables);
    }

    public function render($view)
    {
        //récupère les variables de la vue
        extract($this->vars);

        $controller = get_class($this);
        $controller = substr($controller, 0, -10);
        $controller = strtolower($controller);
        //controller = streamer
        if (file_exists('views/' . $controller . '/' . $view . '.php')) { //si la vue existe
            //on commence à enregistrer dans le buffer ce qu'on affiche
            ob_start();
            //... on affiche des truc
            require 'views/' . $controller . '/' . $view . '.php';
            $content = ob_get_clean();

            require 'views/layout.php';
        } else {
            echo '404 - view not found';
        }
    }
}