<?php
namespace Quick\Controller;

class Api extends Factory
{
    protected function initView(){
        $this->view = \Quick\View\Api::instance();
    }
}
