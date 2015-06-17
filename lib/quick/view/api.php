<?php
namespace Quick\View;

class Api extends Factory
{    
    public function render($tpl = NULL) {
        header('Content-Type: application/json; charset=' . \Quick\Core\App::instance()->get('charset'));
        echo json_encode($this->data);
    }
}