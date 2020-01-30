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
        $this->iniFile = parse_ini_file("./conf/$file.ini", true, INI_SCANNER_NORMAL);
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

        foreach ($this->iniFile as $key => $value) {
            $html .= "<ul>";
            $html .= "<li>" . $key . "</li>";
            $html .= "</ul>";
        }

        $html .= '</form>';

        return $html;
    }
}
