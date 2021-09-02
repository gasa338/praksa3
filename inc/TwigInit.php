<?php

class TwigInit
{
        private static $instance = null;
        private $templateDir;
        private $loader;
        private $twig;

        private function __construct() {
            $this->templateDir = get_template_directory() . '/views/';
            $this->loader = new \Twig\Loader\FilesystemLoader($this->templateDir);
            $this->twig = new \Twig\Environment($this->loader);
        }

        public static function getInit() {
           if(!self::$instance)
           {
               self::$instance = new TwigInit();
           }

           return self::$instance;


        }
        public function getDir(){
            return $this->templateDir;
        }
        public function loadTwig() {
            return $this->loader;
        }
        public function initEnv() {
            return $this->twig;
        }
}