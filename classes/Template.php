<?php
class Template
{
    /*
    * $name - name of template
    * array $data - some data in template
    */
    public function include_template($name, array $data = [])
    {
        $name = 'templates/' . $name; //dir of templates

        if (!is_readable($name)) {
            return 'Error';
        }

        ob_start();
        extract($data);
        require_once $name;

        return ob_get_clean();
    }
}
