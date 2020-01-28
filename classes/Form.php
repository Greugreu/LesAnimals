<?php

class Form
{
    private $method = "post";
    private $url = "";
    private $uploadFile = false;
    private $iniFile;

    public function __construct($action, string $file)
    {
        $this->url = $action;
        $this->iniFile = parse_ini_file("./conf/$file.ini");
    }

    public function displayForm() : string
    {
        $html = '<form ';
        $html .= 'method="' . $this->method . '" ';
        $html .= 'action="' . $this->url . '"';
        if (!$this->uploadFile) {
            $html .= ' enctype="multipart/form-data"';
        }
        $html .= '>';

        return $html;
    }
}
