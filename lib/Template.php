<?php 
class Template {

    //Path to template
    protected $template;
    //variable passed In
    protected $vars = array();

    /* 
        Constructor for passing the file path
    */
    public function __construct($template) {
        $this->template = $template;
    }

    //Getters for $vars
    public function __get($key) {
        return $this->vars[$key];
    }
    /* Setters for $vars 
       $template->SomethingVariable = Something
    */
    public function __set($key, $value) {
        $this->vars[$key] = $value;
    }

    /* extract $name instead of $template->name in a template */
    public function __toString() {
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        include basename($this->template);    
        
        return ob_get_clean();
    }
}