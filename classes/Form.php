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

        foreach ($this->iniFile as $input) {
            $html .= $input['input_name'];
            $html .= $input['input_surname'];
            $html .= $input['input_password'];
            $html .= $input['input_cfrmpass'];
            $html .= $input['input_mail'];
        }

        $html .= '</form>';

        return $html;
    }
}
