<?php
namespace Controllers;

class Version extends \Quick\Controller\Api
{
    public function index() {
        $this->view->set('c', 0);
        $this->view->set('msg', 'ok');
        $this->view->set('data', $this->Version->get());
        $this->view->render('demo');
    }
}
