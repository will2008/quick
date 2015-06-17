<?php
namespace Controllers;

class Index extends \Quick\Controller\Api
{
    public function index($uid = 0) {
        \Quick\Core\Cache::get('12116', 'default', function() {return 2;});
        $this->view->set('c', 0);
        $this->view->set('msg', 'ok');
        $this->view->set('data', array('ip' => $this->clientIp(), 'uid'=> $uid, 'admin' => $this->query('admin', 1), 'post' => $this->is('post')));
        $this->view->render('demo');
    }
}