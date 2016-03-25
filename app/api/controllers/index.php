<?php
namespace Controllers;


class Index extends BaseHtml
{
    public function index() {
        $data = ['users' => [['name' => 'Senhua'], ['name' =>'Will'], ['name' => 'Eric']]];
        $this->view->set($data);
        $this->render('api/index');
    }
}