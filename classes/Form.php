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

    public function beginHtml($title) : string 
    {
        $html = '<!DOCTYPE html>';
        $html .= '<head>';
        $html .= '<meta charset="utf-8" />';
        $html .= '<meta name="viewport" content="width=device-width, initial-scale=no" />';
        $html .= '<title>' . $title . '</title>';
        $html .= '<link href="assets/css/styles.css" rel="stylesheet" />';
        $html .= '</head>';
        $html .= '<body>';

        return $html;
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
            $tagType = explode(":", $key);
            
            if ($tagType [0] === "input") {
                if (!empty($this->iniFile[$key]["labelContent"])) {
                    $html .= '<div>';
                    $html .=    '<label for="' .
                                $tagType[1] . '">' .
                                ucfirst($tagType[1]) . " " .
                                '</label>';
                }

                    if ($this->iniFile[$key]['type'] == 'submit' || $this->iniFile[$key]['type'] == 'reset') {
                        $html .= '<input type="' . $this->iniFile[$key]['type'] . '"' .
                                'value="' . $this->iniFile[$key]['value'] . '" />';
                    } else {
                        $html .=    '<input type="' .
                                $this->iniFile[$key]['type'] . '" ' .
                                'id="' . $tagType[1] . '" ' .
                                'name="' . $tagType[1] . '" ' .
                                'placeholder="Veuillez saisir votre ' . $tagType[1] . '"' .
                                ' />';
                    $html .= '</div>';
                    }
            }
        }

        $html .= '</form>';

        return $html;
    }

    public function endHtml() : string {
        $html = '</body>';
        $html .= '</html>';

        return $html;
    }
}

