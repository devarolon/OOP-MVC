<?php
namespace MyApp\view;
class View
{
    private $path = __DIR__ . '/../template';
    private $template = 'default';

    // template values
    private $_ = [];


    // assign template values
    public function assign(string $key, $value)
    {
        $this->_[$key] = $value;
    }

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    // load and echo template file

    /**
     * @return string
     */
    public function loadTemplate(): string
    {
        $template = $this->template;
        $file = $this->path . '/' . $template . '.php';
        $fileExists = file_exists($file);

        if ($fileExists){
            ob_start();
            require $file;
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
        else {
            return 'Template wurde nicht gefunden';
        }
    }
}
